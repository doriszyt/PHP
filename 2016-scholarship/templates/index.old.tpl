<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>问吧奖学金2015</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/mainstyle3.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="topnav clearfix">
      <div class="container">
        <div class="lefttext"><a href="http://www.wenba.ca">不懂就问吧！ WENBA.CA</a></div>
        <div class="rightsharebox"></div>
      </div>
    </div>

    <div class="mainbanner">
      <div class="container">
        <div class="row">
          <div class="bannerbox col-xs-12"></div>
        </div>
      <!-- container end -->
      </div>
    </div>


    <div class="container">
      <div class="row">
        <div class="main-menu col-xs-12">
          <ul>
            <li><a href="#link-hdjj">活动简介</a></li>
            <li><a href="#link-jxjj">奖项设置</a></li>
            <li><a href="#link-hdrc">活动日程</a></li>
            <li><a href="#link-bmxx">提交申请</a></li>
            <li style="display:none;"><a href="#">评委阵容</a></li>
            <li><a href="#link-jchg">精彩回顾</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container top1box" id="link-hdjj">
      <div class="row maininfoblock">
          <div class="block-titlebox">活动简介</div>
          <div class="n-box col-xs-12">
            <h3>什么是问吧奖学金？</h3><br>
<p>问吧奖学金设立于2014年9月，是一个由问吧网站（wenba.ca）和加国无忧51.CA传媒集团主办，针对华人留学生的奖学金评选活动。 问吧·乐享奖学金通过与十余所学校的华人学生会合作，采用“奖学金”这一最直接的方式，鼓励学生们积极发表“有帮助”、“高质量”的信息，让学生们即可以帮助他人，也能让自己获益，更让学生们感受到正能量的传递。</p>
<br>
<h3>问吧奖学金的宗旨是什么？</h3><br>
<p>问吧奖学金的意在鼓励加拿大华人留学生分享其留学生活的经验和知识。同时，希望留学生能在问吧通过他人的分享得到帮助，再以自身的分享回馈社区。</p>
<br>
<h3>2015年问吧奖学金活动，与往年有何不同？</h3><br>
<p>第二届问吧奖学金的奖金金额更高，奖项更多。除了原有奖项，还增设了个人杰出单项奖以及优秀学生社团奖。<br>
个人杰出单项奖，旨在奖励在比如专业学术、实习工作或其他某一方面具有突出表现的学生；<br>
优秀学生社团奖，旨在表彰华人学生组织为留学生的学习生活、职业发展、课余活动等方面做出的突出贡献。</p>
<br>
<h3>只有成绩优异的学生，才能获得问吧奖学金吗？</h3><br>
<p>问吧乐享奖学金的奖励对象，除了学业优异，还需在志愿者、实习工作方面表现突出，热衷社会活动，积极融入加国生活；同时，在问吧上，乐于和众多留学生一起分享自己的留学知识和经历，尽力解答他人的疑惑。</p>

<style>
.hd-box { background: #f2f2f2; border-radius: 30px; padding: 2em; margin-top: 1em; }
.hd-box ol { padding: 1em 0 0 2em; margin: 0; }
</style>

<div class="hd-box clearfix">
<div class="col-xs-12 col-sm-6">
<div class="hd-box-left">
  <h3>个人申请材料清单：</h3>
<ol>
  <li>学签</li>
  <li>个人简历及成绩单</li>
  <li>留学生活感悟一篇， 不少于500字，中英文不限</li>
  <li>其他材料（个人近照，义工、实习工作推荐信等）</li>
</ol>
</div>
</div>

<div class="col-xs-12 col-sm-6">
<div class="hd-box-right">
  <h3>学生社团申请清单：</h3>
<ol>
  <li>社团简介</li>
  <li>2014-2015年度社团活动简介</li>
</ol>
</div>
</div>

</div>
          </div>
      </div>
    </div>

    <a id="form_is_here"></a>

    <div class="container mt" id="link-bmxx">
      <div class="row maininfoblock mainformbox">
          <div class="block-titlebox">提交申请</div>
          <div class="n-box col-xs-12">

              {if 0 == $logged}
              <!-- 登录前 Begin -->
            <div class="loginbox col-xs-12 col-sm-6">
              <h3>用户登录</h3>
              <ul>
                <li><input id="js-login-username" type="text" placeholder="问吧用户名 / 51登录名"></li>
                <li><input id="js-login-password" type="password" placeholder="密码"></li>
                <li><button id="js-btn-login" type="button" class="btn btn-success">登录</button></li>
              </ul>
            </div>
            <div class="reg-box col-xs-12 col-sm-6">
              <h3>还没有账号？马上注册问吧账号！</h3>
              <button type="button" class="btn btn-success" onclick="location.href='http://www.wenba.ca/account/register/'">立即注册</button>
            </div>
              <!-- 登录前 End -->
              {/if}


            <div class="clearfix"></div>

              {if 1 == $logged}
              <!-- 登录后 Begin -->
                  <div class="select-type-box clearfix" id="js-btn-types" style="border-bottom:1px solid #eee; margin-bottom: 1em; padding-bottom: 1em;">
                      <div class="left col-xs-12 col-sm-6" style="padding-left: 0;">
                          <a type="button" class="btn btn-success" id="js-btn-type-1">个人申请</a>
                      </div>

                      <div class="right col-xs-12 col-sm-6" style="padding-right: 0;">
                          <a type="button" class="btn btn-success" id="js-btn-type-2">社团申请</a>
                      </div>
                  </div>

                  <form method="post" enctype="multipart/form-data" action="submit.php" id="js-form">
                      <input type="hidden" name="form_hash" value="{$form_hash} " />
                      <input type="hidden" name="type" value="{$type}" />

                      {if 1 == $type}
            <div class="formbox" id="js-form-type-1">
              <div class="textlist-box" style="display:none;">
                <h3>个人申请材料清单：</h3>
                <ol>
                  <li>学签</li>
                  <li>个人简历及成绩单</li>
                  <li>留学生活感悟一篇， 不少于500字，中英文不限</li>
                  <li>其他材料（个人近照，义工、实习工作推荐信等）</li>
                </ol>
              </div>
              <ul class="col-xs-12 col-sm-6 block01">
                <li><input type="text" name="name" placeholder="姓名" id="js-name" maxlength="20"></li>
                <li><input type="text" name="school" placeholder="学校" id="js-school" maxlength="50"></li>
                <li><input type="text" name="field" placeholder="专业" id="js-field" maxlength="30"></li>
                <li><input type="text" name="phone" placeholder="电话" id="js-phone" maxlength="15"></li>
              </ul>

              <div class="col-xs-12 col-sm-6 block02">

                  <input type="text" class="titleipt" placeholder="标题" id="js-title" name="title">
                  <textarea name="content" id="js-content">公开信息，留学生活感悟，将发表在问吧。发表之后如需补充，可进入问吧对应文章编辑。</textarea>

              </div>

              <ul class="row block03">
                  <li class="col-xs-12 col-sm-6 leftli"><span>
                          <label>成绩单（点击上传）</label>
                          <input type="file" name="file_transcript" class="js-files"></span>
                  </li>
                  <li class="col-xs-12 col-sm-6 rightli"><span><label>学签（点击上传）</label><input type="file" name="file_visa" class="js-files"></span></li>
                  <li class="col-xs-12 col-sm-6 leftli"><span><label>个人简历（点击上传）</label><input type="file" name="file_resume" class="js-files"></span></li>
                  <li class="col-xs-12 col-sm-6 rightli"><span><label>其他材料（如有多个文件请上传压缩包）</label><input type="file" name="file_others" class="js-files"></span></li>
              </ul>

              <div class="row block04">
                <div class="col-xs-12 col-sm-6">
                  <button type="submit" class="btn btn-success" id="js-btn-submit">确认提交</button>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <p>ps: 确保以上信息资料真实无误，方可提交。</p>
                </div>
              </div>
              <p style="color: #999; padding-top: 1em; text-align: center;">
                如有任何疑问，请发邮件至：info@wenba.ca 或在问吧上发帖即可。
              </p>
            <!-- formbox end -->
            </div>
                      {/if}

                      {if 2 == $type}
            <div class="formbox" id="js-form-type-2">
              <ul class="col-xs-12 col-sm-6 block01">
                <li><input type="text" placeholder="社团名称" name="name" id="js-name" maxlength="50"></li>
                <li><input type="text" placeholder="所属学校" name="school" id="js-school" maxlength="50"></li>
                <li><input type="text" placeholder="联系人" name="contact" id="js-contact" maxlength="20"></li>
                <li><input type="text" placeholder="电话" name="phone" id="js-phone" maxlength="15"></li>
              </ul>

              <div class="col-xs-12 col-sm-6 block02">
                  <input type="text" class="titleipt" placeholder="标题" id="js-title" name="title">
                  <textarea name="content" id="js-content">社团简介及2014-2015年度社团活动简介，将发表在问吧。发表之后如需补充，可进入问吧对应文章编辑。</textarea>
              </div>

              <ul class="row block03"></ul>

              <div class="row block04">
                <div class="col-xs-12 col-sm-6">
                  <button type="submit" class="btn btn-success" id="js-btn-submit">确认提交</button>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <p>ps: 确保以上信息资料真实无误，方可提交。</p>
                </div>
              </div>
              <p style="color: #999; padding-top: 1em; text-align: center;">
                如有任何疑问，请发邮件至：info@wenba.ca 或在问吧上发帖即可。
              </p>
            <!-- formbox #group-form end -->
            </div>
                      {/if}


              <!-- 登录后 End -->
                  </form>
              {/if}

          </div>
      </div>
    </div>


    <div class="container mt" id="link-hdrc">
      <div class="row maininfoblock event-sh">
          <div class="block-titlebox">活动日程</div>
          <div class="n-box col-xs-12">
            <div class="row sh-ul">
              <div class="col-sm-12 col-md-4"><div><span>7.1～10.4</span> <p>报名申请</p></div></div>
              <div class="col-sm-12 col-md-4"><div><span>10.5～11.9</span> <p>评委甄选及线上投票</p></div></div>
              <div class="col-sm-12 col-md-4"><div><span>11.14</span> <p>颁奖晚宴</p></div></div>
            </div>
          </div>
      </div>
    </div>


    <div class="container mt jxjj-block" id="link-jxjj">
      <div class="row maininfoblock">
          <div class="block-titlebox">奖项设置</div>
          <div class="n-box col-xs-12">
            <div class="s-item col-xs-12 col-sm-4"><span>一等奖（1名）</span></div>
            <div class="s-item col-xs-12 col-sm-4"><span>二等奖（2名）</span></div>
            <div class="s-item col-xs-12 col-sm-4"><span>三等奖（3名）</span></div>
            <div class="s-item col-xs-12 col-sm-6"><span>卓越个人奖（3名）</span></div>
            <div class="s-item col-xs-12 col-sm-6"><span>优秀社团奖（3个）</span></div>
          </div>
      </div>
    </div>

    <div class="container mt pw-box" style="display:none;">
      <div class="row maininfoblock">
          <div class="block-titlebox">评委阵容</div>
          <div class="n-box col-xs-12">
            <div class="row">
              <div class="col-sm-12 col-sm-3 list-box"><img src="images/u.png"><h3>即将揭晓</h3><p></p></div>
              <div class="col-sm-12 col-sm-3 list-box"><img src="images/u.png"><h3>即将揭晓</h3><p></p></div>
              <div class="col-sm-12 col-sm-3 list-box"><img src="images/u.png"><h3>即将揭晓</h3><p></p></div>
              <div class="col-sm-12 col-sm-3 list-box"><img src="images/u.png"><h3>即将揭晓</h3><p></p></div>
            </div>
          </div>
      </div>
    </div>


    <div class="container mt wangqi" id="link-jchg">
      <div class="row maininfoblock">
          <div class="block-titlebox">2014问吧奖学金精彩文章</div>
          <div class="n-box col-xs-12">
            <dl class="clearfix">
                <dt>生活体验</dt>
                <dd>
                    <ul>
                        <li>
                            <a href="http://www.wenba.ca/article/62" target="_blank">
                                <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/xia_xue.jpg"></div>
                                <p>外面的世界</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://www.wenba.ca/article/61" target="_blank">
                                <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/zhang_xin.jpg"></div>
                                <p>How to Overcome Loneliness and Homesickness</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://www.wenba.ca/question/5043" target="_blank">
                                <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/zhang_muchu.jpg"></div>
                                <p>你会对留学的自己说，怎样的人生才是值得一过的呢？</p>
                            </a>
                        </li>

                        <li>
                            <a href="http://www.wenba.ca/question/5051" target="_blank">
                                <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/zhang_muchu.jpg"></div>
                                <p>那些年，远隔千山万水的我们，要怎么才能让你们知道我很好呢？</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://www.wenba.ca/article/74" target="_blank">
                                <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/qu_haining.jpg"></div>
                                <p>我的加拿大印象</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://www.wenba.ca/article/75" target="_blank">
                                <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/wang_ruoyi.jpg"></div>
                                <p>葡萄酒挑选</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://www.wenba.ca/article/69" target="_blank">
                                <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/yang_mingxuan.jpg"></div>
                                <p>留学生融入当地环境经验谈</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://www.wenba.ca/article/65" target="_blank">
                                <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/ou_shunxian.jpg"></div>
                                <p>Learning English and Making Foreign Friends in Canada</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://www.wenba.ca/article/77" target="_blank">
                                <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/wang_sicong.jpg"></div>
                                <p>《初到加拿大——关于宗教信仰》</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://www.wenba.ca/question/5020" target="_blank">
                                <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/wang_enci.jpg"></div>
                                <p>Presquile Camping 阳光以下，沙滩以上</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://www.wenba.ca/question/4926" target="_blank">
                                <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/han_xiao.jpg"></div>
                                <p>淘金路上淘风景 Klondike高速一路向北</p>
                            </a>
                        </li>


                        <li>
                            <a href="http://www.wenba.ca/article/54" target="_blank">
                                <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/han_xiao.jpg"></div>
                                <p>白求恩故居一游</p>
                            </a>
                        </li>

                    </ul>
                </dd>
            </dl>



            <dl class="clearfix">
        <dt>校园生活</dt>
        <dd>
            <ul>
                <li>
                    <a href="http://www.wenba.ca/article/71" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/xia_xue.jpg"></div>
                        <p>那些年我们的学生会</p>
                    </a>
                </li>

                <li>
                    <a href="http://www.wenba.ca/article/79" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/liu_suisui.jpg"></div>
                        <p>Who are you meant to be? Who do you want to be?</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/question/5047" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/liang_yaoyuan.jpg"></div>
                        <p>问吧乐享奖学金文章 - UTSC L</p>
                    </a>
                </li>

                <li>
                    <a href="http://www.wenba.ca/article/59" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/han_xiao.jpg"></div>
                        <p> 图书馆无死角利用指南</p>
                    </a>
                </li>

            </ul>
        </dd>
    </dl>




    <dl class="clearfix">
        <dt>经验分享</dt>
        <dd>
            <ul>

                <li>
                    <a href="http://www.wenba.ca/article/67" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/hu_you.jpg"></div>
                        <p>带父母旅游经验之谈</p>
                    </a>
                </li>

                <li>
                    <a href="http://www.wenba.ca/question/5052" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/zhang_wanhan.jpg"></div>
                        <p>关于加拿大的经历学习篇加生活篇</p>
                    </a>
                </li>

                <li>
                    <a href="http://www.wenba.ca/article/80" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/zhang_muchu.jpg"></div>
                        <p>我的出走年代：从台北到剑桥 &amp; 从昆士兰到滇中小镇</p>
                    </a>
                </li>

                <li>
                    <a href="http://www.wenba.ca/article/76" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/wang_ruoyi.jpg"></div>
                        <p>经验分享 — AED/CPR</p>
                    </a>
                </li>

                <li>
                    <a href="http://www.wenba.ca/question/5025" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/gao_jiawei.jpg"></div>
                        <p>租房经验交流</p>
                    </a>
                </li>

                <li>
                    <a href="http://www.wenba.ca/question/5024" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/gao_jiawei.jpg"></div>
                        <p>乐于奉献，在义工活动中学习与成长</p>
                    </a>
                </li>

                <li>
                    <a href="http://www.wenba.ca/question/5067" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/zhang_rui.jpg"></div>
                        <p>个人经验分享 Keep Going !!</p>
                    </a>
                </li>

                <li>
                    <a href="http://www.wenba.ca/article/68" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/yang_mingxuan.jpg"></div>
                        <p>Volunteering is never so easy高中志愿者教师故事分享</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/article/78" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/liu_suisui.jpg"></div>
                        <p>英伦印象-我的交换之旅</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/article/64" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/ou_shunxian.jpg"></div>
                        <p>Awesome Conference Experience in Canada</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/article/72" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/zhen_xiang.jpg"></div>
                        <p>Internship experience in Ontario Power Generation (OPG)</p>
                    </a>
                </li>

            </ul>
        </dd>
    </dl>


    <dl class="clearfix">
        <dt>专业学术</dt>
        <dd>
            <ul>
                <li>
                    <a href="http://www.wenba.ca/question/4872" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/huang_yaqi.jpg"></div>
                        <p>What does a Drama student actually learn at U of T?</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/article/66" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/hu_you.jpg"></div>
                        <p>York 转入 Schulich 经验之谈</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/article/58" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/huang_yaqi.jpg"></div>
                        <p>问吧乐享奖学金札记 - 我考雅思的经历</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/article/60" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/zhang_xin.jpg"></div>
                        <p>My Experience in the Master of Financial Accountability Program</p>
                    </a>
                </li>

                <li>
                    <a href="http://www.wenba.ca/question/5049" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/zhang_muchu.jpg"></div>
                        <p>要怎样做，才能成功获得国家公派资格出国留学？</p>
                    </a>
                </li>

                <li>
                    <a href="http://www.wenba.ca/question/5023" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/gao_jiawei.jpg"></div>
                        <p>工程学科的经验交流</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/question/5046" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/xu_zhaojiang.jpg"></div>
                        <p>我的神学之路</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/article/73" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/li_jiaying.jpg"></div>
                        <p>揭开schulich申请的面纱</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/question/5026" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/yang_mingxuan.jpg"></div>
                        <p>学商科究竟是好坏？</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/article/57" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/han_xiao.jpg"></div>
                        <p>哈德逊海湾公司百年发展史 - 透析毛皮贸易与加拿大西北地区发展</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/article/63" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/ou_shunxian.jpg"></div>
                        <p>个人小传——人文地理的出路？</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/article/70" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/zhen_xiang.jpg"></div>
                        <p>机械工程－机电经验分享</p>
                    </a>
                </li>


                <li>
                    <a href="http://www.wenba.ca/article/53" target="_blank">
                        <div class="avator-box"><img src="http://scholarship.wenba.ca/2014/images/candidates_voting/han_xiao.jpg"></div>
                        <p>加拿大林业教育发展新趋势 - 多伦多大学林学院博士</p>
                    </a>
                </li>

            </ul>
        </dd>
    </dl>




          </div>
      </div>
    </div>


    <div class="container-fluid footer">
      <div class="row">
        <div class="col-xs-12">
          问吧(WENBA.CA) &copy 加国无忧旗下子站
        </div>
      </div>
    </div>


    <div class="container qrbox">
      <div class="row">
        <div class="qr-codebox">
          <img src="images/arcode.png">
          <p>
            关注问吧微信<br>随时获取加拿大<br>留学生活资讯
          </p>
        </div>
      </div>
    </div>

    <script src="./js/jquery.min.js"></script>
    <script src="./js/garlic.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script>
        var SERVER_FLAG_TYPE = {$type}; //服务器端生成的变量，用于标记当前的报名类型
    </script>
    <script src="./js/jxj2015.js?rand={$rand}"></script>
  </body>
</html>
