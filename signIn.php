<?php
/**
 * php实现签到功能
 * Created by PhpStorm.
 * User: wenjunting50779@gmail.com
 * Date: 2019/5/17
 * Time: 15:53
 * Class SignIn
 */

class SignIn
{
    //签到记录
    private $record;

    public function __construct($record='')
    {
        $this->record = $record;
    }


    /**
     * 签到
     * @param string $record 当前月的签到记录 如果为空则传空  二进制字符串  最长31位 每位代表每天的签到  0-未签到  1-签到
     * @return string 返回已签到的二进制数据 如用户2号，4号签到了  返回的数据为 0101
     */
    public function sign()
    {
        $padLength = date('d') - 1;
        if (strlen($this->record) > $padLength) return $this->record;
        //记录为空左边补0，反之右边补0
        return $this->record = $this->record ? str_pad($this->record, $padLength, '0') . '1' : str_repeat('0', $padLength) . '1';
    }


    /**
     * 获取本月连续最长连续签到的天数
     * @param string $record
     * @return int
     */
    public function getContinuousDaysByMonth()
    {
        preg_match_all('/[1]{1,}/', $this->record, $match);
        $max = 0;
        if (!empty($match[0])) {
            array_reduce($match[0], function ($carry, $item) use (&$max) {
                $length = strlen($item);
                if ($length > $max) {
                    $max = $length;
                }
            });
        }
        return $max;
    }

    /**
     * 获取最后一次最长连续签到的天数
     * @param string $record
     * @return int
     */
    public function getLastContinuousDays()
    {
        preg_match_all('/[1]{1,}/', $this->record, $match);
        return empty($match[0]) ? 0 : strlen(end($match[0]));
    }

    public function getInt()
    {
        return bindec($this->record);
    }

    //每个月值转换为int
    public function getBit($num,$dateFormatByYm)
    {
        return str_pad(decbin($num),date('t',strtotime($dateFormatByYm)),'0',STR_PAD_LEFT);
    }


}

//无记录第一次签到
$signIn = new SignIn();
$signIn->sign();   //  2019-5-8 第一次签到 00000001

//2019-5-9 有记录第二次签到
$signIn = new SignIn('00000001');
$signIn->sign();  //000000011

//获取最长连续天数
$signIn->getContinuousDaysByMonth();

//获取最后一次连续签到天数
$signIn->getLastContinuousDays();

//bit转为int
$signIn->getInt();

//整型转bit
$signIn->getBit('1991','2019-05');

