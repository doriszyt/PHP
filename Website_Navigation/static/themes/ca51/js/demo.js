
// 主站的链接地址
var HOME_SITE_URL = 'http://www.51.ca';


/**
 * 显示农历
 * @param CalendarBoxID
 */
var displayCalendar = function(CalendarBoxID){
    $("#" + CalendarBoxID).html('<span class="date">' + Calendar.day() + '</span> <span class="lcal">' + Calendar.cnday() + '</span>');
};


/**
 * 显示天气信息
 * @param WeatherBoxID
 */

var displayWeather = function (WeatherBoxID){
  $.get('data/weather-gas-data.json', function(data){
    var rollingDiv = $("#" + WeatherBoxID);
    var html = '';
    $.each(data, function(n, v) {
      html += '<li>';
      html += '<img src="static/images/weather/' + v.cicon + '.png" border="0" /> ';
      html += '<a href="' + HOME_SITE_URL + '/weather/index.php#city' + n + '" target="_blank" title="当前天气情况 ' + v.context + '">' + v.city + '</a> ';
      html += '<span class="tempbox"><b class="ctemp">' + v.temp +'</b></span> | ';
      html += '<span class="feelbox">温度感觉：<b class="ftemp">' + v.realfeel + '</b></span> | ';
      html += '<span class="gasbox">平均油价：<b class="gas">' + v.gas_price + '</b></span>';
      html += '</li>';
      html += "\n";
    });

    if(html != '')
    {
      rollingDiv.html('<ul class="weatherList">' + html + '</ul>').slide({
        mainCell    : 'ul.weatherList',
        autoPage    : true,
        effect      : 'topLoop',
        autoPlay    : true,
        vis         : 1,
        /*easing      : 'easeInBack',*/
        delayTime   : 700,
        interTime   : 3500
      });
    }
  });
};

/**
 * 显示彩票信息
 * @param LottoBoxID
 */
var displayLotto = function(LottoBoxID){
  $("#" + LottoBoxID).load('data/recent-lottos.html');
};

/**
 * 获取汇率设置信息
 */

var currencyConvertorInited = false;
var currencyConvertorInit = function() {
  $.getJSON(
      // NB: using Open Exchange Rates here, but you can use any source!
      '/data/currency-data.json',
      function(data) {
        // Check money.js has finished loading:
        if ( typeof fx !== "undefined" && fx.rates ) {
          fx.rates = data.rates;
          fx.base = data.base;
        } else {
          // If not, apply to fxSetup global:
          var fxSetup = {
            rates : data.rates,
            base : data.base
          }
        }
        currencyConvertorInited = true;
      }
  );
};


/**
 * 汇率转换函数
 */
var currencyConvert = function()
{
  if (!currencyConvertorInited)
  {
    currencyConvertorInit();
    window.setTimeout(function(){
      currencyConvert();
    }, 500);
    return;
  };

  var $box = $('#currencybox');
  var option = {
    amount      : parseFloat($('#currency-amount', $box).val().replace(/\,/g,'')),
    from        : $('#currency-from', $box).find(":selected").val(),
    from_name   : $('#currency-from', $box).find(":selected").text(),
    to          : $('#currency-to', $box).find(":selected").val(),
    to_name     : $('#currency-to', $box).find(":selected").text()
  };

  if(!option.amount)
  {
    $('#currency-result', $box).html('请输入正确的兑换金额').addClass('error');
  }
  else if(option.from == option.to)
  {
    $('#currency-result', $box).html('请选择要查询的兑换币种').addClass('error');
  }
  else
  {
    var result_amount = fx.convert(option.amount, {from: option.from, to: option.to});
    if(result_amount)
    {
      var result_str = '<b>' + toCurrency(option.amount) + '</b> ' + option.from_name + ' = ' + '<b>' + toCurrency(result_amount) + '</b> ' + option.to_name;
      $('#currency-result', $box).html(result_str).removeClass('error');
    }
    else
    {
      $('#currency-result', $box).html('抱歉，无法获取兑换信息').addClass('error');
    }
  }
};

/**
 * 对换币种
 */
var switchCurrency = function()
{
  var $box = $('#currencybox');
  var oldFrom = $('#currency-from', $box).find(":selected").val(),
      oldTo = $('#currency-to', $box).find(":selected").val();

  $('#currency-from', $box).val(oldTo);
  $('#currency-to', $box).val(oldFrom);
  currencyConvert();
};

/**
 * 格式化货币函数
 */
var toCurrency = function (num)
{
  num = Math.round(num*100)/100;
  var currstring = num.toString();
  if(currstring.match(/\./))
  {
    var curr = currstring.split('.');
  }
  else
  {
    var curr=[currstring,"00"];
  };
  curr[1]+="00";
  curr[2]="";
  var returnval = "";
  var length = curr[0].length;
  for(var i = 0; i < 2; i++)
  {
    curr[2]+=curr[1].substr(i,1);
  };
  for(i = length; (i-3) > 0; i = i-3)
  {
    returnval = "," + curr[0].substr(i-3,3) + returnval;
  };
  returnval = curr[0].substr(0,i) + returnval + "." + curr[2];
  return(returnval);
};


/**
 * 显示彩票信息
 * @param LottoBoxID
 */
var displayInfos = function(section){
  $("#" + section + 'box').load('data/recent-' + section + '.html');
};

/**
 * 页面开始加载的信息
 */
$(document).ready(function() {
  displayCalendar('datebox');
  displayWeather('weatherbox');
  displayLotto('lottobox');
  currencyConvert();
  displayInfos('news');
  displayInfos('events');
  displayInfos('discounts');
});

$(document).ready(function(){
  currencyConvert();
  $('select, #currency-amount', $('#Exchangeratebox')).change(function () {
    currencyConvert();
  })
});