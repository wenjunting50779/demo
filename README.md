**实现签到**

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