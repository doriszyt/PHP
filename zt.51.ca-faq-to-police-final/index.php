<?php
include('./inc/init.php');

$current_count       = ORM::for_table('policeyangconference')->count(); //统计已有的提问记录数量
$flag_allowed_submit = (intval($current_count) >= MAX_PEOPLE) ? false : true;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>杨警官信箱网友见面会</title>

    <!-- css -->
    <link href="css/style.css?rand=<?php echo time(); ?>" rel="stylesheet">
    <link href="css/normalize.min.css" rel="stylesheet">
    <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="./js/client.js?rand=<?php echo time(); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </head>
  <body>
    <div class="wrap">
      <div class="jumbotron">
          <img src="imgs/hero-banner.jpg"/>
      </div>
      <div class="content clearfix">
        <aside>
          <div class="sidebar">
            <div class="box">
              <img class="banner" src="imgs/yang-email.jpg"/>
              <div class="box-content">
                <p>杨警官信箱这个栏目是加国无忧网和51周报与多伦多警队合作开辟的华人社区公益平台，其目的是帮助大家了解多伦多的警务知识以及与警方打交道的常识。欢迎随时向杨警官提问，杨警官公务繁忙时会有其他警官代为答复网友来信。</p>
                <p><strong>来信请寄杨警官信箱: <a href="mailto:tps@51.ca">tps@51.ca</a></strong></p>
              </div>
            </div><!-- box end -->
            <div class="box">
              <img class="banner" src="imgs/speaker.jpg"/>
              <div class="box-content">
                <h3>杨乾良警官</h3>
                <p>杨乾良警官于70年代出生于中国河南，在广州读了4年的大学并拿到学士学位。大学毕业之后在广州工作了4年，1998年底以技术移民身份移民加拿大。2006年4月成为多伦多警队的一员。2014年3月被调任华人社区联络警官一职，主要从事华人社区方面的警务工作。</p>

              </div>
            </div>
          </div>
        </aside>
        <p>多伦多警局与51.CA合办的《杨警官信箱》自2014年9月开办以来，受到了广大读者的热烈欢迎，收到了大量的来信，杨警官也选择了部分问题给了解答，但由于人手和精力的局限，还是有大量的问题无法一一作答。</p>
        <p>为更好地服务华人社区，本站将于12月19日（周六）举办一场《杨警官信箱读者见面会》，届时，我们将邀请杨警官和多伦多警局就业部门的资深警官到场，就大家最为关心的交通安全、交通告票、报考警察等问题举办专题讲座，并会现场互动，及时解答大家关心的问题。
</p>
        <div class="info">
          <div class="info-title">活动详情</div>
          <div class="info-content">时间：2015年12月19日（周六） 10:00-13:00<br/>
               地址：2330 Midland Ave., Scarborough (位于Midland/401北面)<br/>
               内容：交通安全、交通告票、报考警察<br/>
               人数：80人（主办方将在现场准备茶点款待）
          </div>
         </div>
         <form action="submit.php" method="post" onsubmit="return verifyForm()">
           <div class="form-wrap">
             <p class="form-intro">由于会场座位有限，请有意参加本次见面会的网友先填写下表报名，我们的工作人员稍后会与您邮件联系。杨警官与现场嘉宾会选择有代表性的问题进行回答。</p>
             <div class="input-wrap clearfix">
                 <label>联系人</label>
                 <input id="name" name="name" type="text" placeholder="请填写您的姓名" />
             </div>
             <div class="input-wrap clearfix">
                 <label>邮件</label>
                 <input id="email" name="email" type="text" placeholder="请填写您的邮箱地址" />
             </div>
             <div class="input-wrap clearfix">
                 <label>提问内容</label>
                 <textarea rows="8" cols="50" id="content" name="content" placeholder="请填写您感兴趣的问题,杨警官将在现场对您的问题进行答复"></textarea>
             </div>

             <div class="btn-wrap">
                 <?php if ($flag_allowed_submit): ?>
                     <button class="submit-btn" type="submit">提交</button>
                 <?php else: ?>
                     <button class="submit-btn" type="button">提交</button>
                 <?php endif; ?>
             </div>

               <?php if (! $flag_allowed_submit): ?>
                   <div class="full-cover">对不起，报名人数已满。</div>
               <?php endif; ?>
           </div>

         </form>

         <div class="sponsors">
            <div class="clearfix"><span>主办方:</span><img src="imgs/sponsors.jpg"/></div>
            <div class="clearfix"><span>协办方：</span><img src="imgs/cics.jpg"/></div>
         </div>
       </div>
  </div>

 <footer><div class="footer">版权所有 &copy; 2015 加国无忧中文网络 51.CA</div>
 </footer>

  </body>
</html>
