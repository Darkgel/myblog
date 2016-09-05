<!DOCTYPE html>
<html>
<head>
    <title>兼容手机端的国外漂亮网站管理系统后台模板HTML - JS代码网</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<div class="total-content">
    <div class="col-md-3 side-bar">
        <div class="logo text-center">
            <a href="#"><img src="images/logo.png" alt="" /></a>
        </div>
        <div class="navigation">
            <h3>Navigation</h3>
            <ul>
                <li><a href="#"><i class="dash"></i></a></li>
                <li><a href="#">Dashboard</a></li>
            </ul>
            <ul>
                <li><a href="#"><i class="mail"></i></a></li>
                <li><a href="#">Emails</a></li>
            </ul>
            <ul>
                <li><a href="#"><i class="cal"></i></a></li>
                <li><a href="#">Calendar</a></li>
            </ul>
            <ul>
                <li><a href="#"><i class="page"></i></a></li>
                <li><a href="#">Pages</a></li>
            </ul>
        </div>
        <div class="navigation">
            <h3>Featured</h3>
            <ul>
                <li><a href="#"><i class="chat"></i></a></li>
                <li><a href="#">Charts</a></li>
            </ul>
            <ul>
                <li><a href="#"><i class="art"></i></a></li>
                <li><a href="#">Articals</a></li>
            </ul>
            <ul>
                <li><a href="#"><i class="user"></i></a></li>
                <li><a href="#">Users</a></li>
            </ul>
            <ul>
                <li><a href="#"><i class="fat"></i></a></li>
                <li><a href="#">Favorites</a></li>
            </ul>
            <ul>
                <li><a href="#"><i class="speed"></i></a></li>
                <li><a href="#">Speed</a></li>
            </ul>
            <ul>
                <li><a href="#"><i class="setting"></i></a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>
        <div class="navigation">
            <h3>All Others</h3>
            <ul>
                <li><a href="#"><i class="rev"></i></a></li>
                <li><a href="#">Revenue</a></li>
            </ul>
            <ul>
                <li><a href="#"><i class="pic"></i></a></li>
                <li><a href="#">Pictures</a></li>
            </ul>
            <ul>
                <li><a href="#"><i class="faq"></i></a></li>
                <li><a href="#">FAQs</a></li>
            </ul>
        </div>
    </div>

    <div class="col-md-9 content">
        <div class="home-strip">
            <div class="view">
                <ul>
                    <li><a href="index.html"><i class="refresh"></i></a></li>
                    <li class="messages"><a href="#"><i class="msgs"></i><span class="red">8</span></a></li>
                    <li class="notifications"><a href="#"><i class="bell"></i><span class="blue">9</span></a></li>
                </ul>
            </div>
            <div class="search">
                <div class="search2">
                    <form>
                        <input type="submit" value="">
                        <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"/>
                    </form>
                </div>
            </div>
            <div class="member">
                <p><a href="#"><i class="men"></i></a><a href="#">John Deo</a></p>
                <div id="dd" class="wrapper-dropdown-2" tabindex="1"><span><img src="images/settings.png"/></span>
                    <ul class="dropdown">

                        <li><a href="#">View Profile </a></li>
                        <li><a href="#">Lists</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Activity log</a></li>
                        <li><a href="#">Report a problem</a></li>
                        <li><a href="#">Log out</a></li>
                    </ul>
                </div>
                <!-----end-wrapper-dropdown-2---->
                <!-----start-script---->
                <script type="text/javascript">
                    function DropDown(el) {
                        this.dd = el;
                        this.initEvents();
                    }
                    DropDown.prototype = {
                        initEvents : function() {
                            var obj = this;

                            obj.dd.on('click', function(event){
                                $(this).toggleClass('active');
                                event.stopPropagation();
                            });
                        }
                    }
                    $(function() {

                        var dd = new DropDown( $('#dd') );

                        $(document).click(function() {
                            // all dropdowns
                            $('.wrapper-dropdown-2').removeClass('active');
                        });

                    });
                </script>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <p class="home"><a href="#">Home</a> > <strong> Dashboard</strong></p>
        <div class="list_of_members">
            <div class="visitors">
                <h4>TOTAL <strong>VISITOR</strong></h4>
                <h3>40,600</h3>
                <p>10% New Today </p>
                <a href="#"><i class="go"></i></a>
                <div class="clearfix"></div>
            </div>
            <div class="sales">
                <h4>TOTAL <strong>SALE</strong></h4>
                <h3>13,370</h3>
                <p>400 New Today </p>
                <a href="#"><i class="go"></i></a>
                <div class="clearfix"></div>
            </div>
            <div class="users">
                <h4>TOTAL <strong>USER</strong></h4>
                <h3>15,200</h3>
                <p>470 New Today </p>
                <a href="#"><i class="go"></i></a>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="graph">
            <div class="alert-close2"> </div>
            <div id="chartdiv" style="width:100%; height:400px;"></div>
        </div>
        <div class="total-world">
            <div class="world-map">
                <div class="alert-close6"> </div>
                <h3>World Sales</h3>
                <p><span class="color1"></span>40%<span class="color2"></span>12%<span class="color3"></span>11%<span class="color4"></span>10%<span class="color5"></span>18%</p>
                <div class="clearfix"></div>
                <div id="map1" style="width:100%; height: 380px"></div>
                <button id="focus-single">Focus on Australia</button>
                <button id="focus-multiple">Focus on Australia and Japan</button>
                <button id="focus-coords">Focus on Cyprus</button>
                <button id="focus-init">Return to the initial state</button>
                <script src="js/jquery-1.8.2.js"></script>
                <script src="js/jquery-jvectormap.js"></script>
                <script src="js/jquery-mousewheel.js"></script>

                <script src="js/jvectormap.js"></script>

                <script src="js/abstract-element.js"></script>
                <script src="js/abstract-canvas-element.js"></script>
                <script src="js/abstract-shape-element.js"></script>

                <script src="js/svg-element.js"></script>
                <script src="js/svg-group-element.js"></script>
                <script src="js/svg-canvas-element.js"></script>
                <script src="js/svg-shape-element.js"></script>
                <script src="js/svg-path-element.js"></script>
                <script src="js/svg-circle-element.js"></script>
                <script src="js/svg-image-element.js"></script>
                <script src="js/svg-text-element.js"></script>

                <script src="js/vml-element.js"></script>
                <script src="js/vml-group-element.js"></script>
                <script src="js/vml-canvas-element.js"></script>
                <script src="js/vml-shape-element.js"></script>
                <script src="js/vml-path-element.js"></script>
                <script src="js/vml-circle-element.js"></script>
                <script src="js/vml-image-element.js"></script>

                <script src="js/map-object.js"></script>
                <script src="js/region.js"></script>
                <script src="js/marker.js"></script>

                <script src="js/vector-canvas.js"></script>
                <script src="js/simple-scale.js"></script>
                <script src="js/ordinal-scale.js"></script>
                <script src="js/numeric-scale.js"></script>
                <script src="js/color-scale.js"></script>
                <script src="js/legend.js"></script>
                <script src="js/data-series.js"></script>
                <script src="js/proj.js"></script>
                <script src="js/map.js"></script>
                <script src="js/jquery-jvectormap-world-mill-en.js"></script>
                <link rel="stylesheet" media="all" href="css/jquery-jvectormap.css"/>
                <script>
                    jQuery.noConflict();
                    jQuery(function(){
                        var $ = jQuery;

                        $('#focus-single').click(function(){
                            $('#map1').vectorMap('set', 'focus', {region: 'AU', animate: true});
                        });
                        $('#focus-multiple').click(function(){
                            $('#map1').vectorMap('set', 'focus', {regions: ['AU', 'JP'], animate: true});
                        });
                        $('#focus-coords').click(function(){
                            $('#map1').vectorMap('set', 'focus', {scale: 7, lat: 35, lng: 33, animate: true});
                        });
                        $('#focus-init').click(function(){
                            $('#map1').vectorMap('set', 'focus', {scale: 1, x: 0.5, y: 0.5, animate: true});
                        });
                        $('#map1').vectorMap({
                            map: 'world_mill_en',
                            panOnDrag: true,
                            focusOn: {
                                x: 0.5,
                                y: 0.5,
                                scale: 2,
                                animate: true
                            },
                            series: {
                                regions: [{
                                    scale: ['#C8EEFF', '#0071A4'],
                                    normalizeFunction: 'polynomial',
                                    values: {
                                        "AF": 16.63,
                                        "AL": 11.58,
                                        "DZ": 158.97,
                                        "AO": 85.81,
                                        "AG": 1.1,
                                        "AR": 351.02,
                                        "AM": 8.83,
                                        "AU": 1219.72,
                                        "AT": 366.26,
                                        "AZ": 52.17,
                                        "BS": 7.54,
                                        "BH": 21.73,
                                        "BD": 105.4,
                                        "BB": 3.96,
                                        "BY": 52.89,
                                        "BE": 461.33,
                                        "BZ": 1.43,
                                        "BJ": 6.49,
                                        "BT": 1.4,
                                        "BO": 19.18,
                                        "BA": 16.2,
                                        "BW": 12.5,
                                        "BR": 2023.53,
                                        "BN": 11.96,
                                        "BG": 44.84,
                                        "BF": 8.67,
                                        "BI": 1.47,
                                        "KH": 11.36,
                                        "CM": 21.88,
                                        "CA": 1563.66,
                                        "CV": 1.57,
                                        "CF": 2.11,
                                        "TD": 7.59,
                                        "CL": 199.18,
                                        "CN": 5745.13,
                                        "CO": 283.11,
                                        "KM": 0.56,
                                        "CD": 12.6,
                                        "CG": 11.88,
                                        "CR": 35.02,
                                        "CI": 22.38,
                                        "HR": 59.92,
                                        "CY": 22.75,
                                        "CZ": 195.23,
                                        "DK": 304.56,
                                        "DJ": 1.14,
                                        "DM": 0.38,
                                        "DO": 50.87,
                                        "EC": 61.49,
                                        "EG": 216.83,
                                        "SV": 21.8,
                                        "GQ": 14.55,
                                        "ER": 2.25,
                                        "EE": 19.22,
                                        "ET": 30.94,
                                        "FJ": 3.15,
                                        "FI": 231.98,
                                        "FR": 2555.44,
                                        "GA": 12.56,
                                        "GM": 1.04,
                                        "GE": 11.23,
                                        "DE": 3305.9,
                                        "GH": 18.06,
                                        "GR": 305.01,
                                        "GD": 0.65,
                                        "GT": 40.77,
                                        "GN": 4.34,
                                        "GW": 0.83,
                                        "GY": 2.2,
                                        "HT": 6.5,
                                        "HN": 15.34,
                                        "HK": 226.49,
                                        "HU": 132.28,
                                        "IS": 12.77,
                                        "IN": 1430.02,
                                        "ID": 695.06,
                                        "IR": 337.9,
                                        "IQ": 84.14,
                                        "IE": 204.14,
                                        "IL": 201.25,
                                        "IT": 2036.69,
                                        "JM": 13.74,
                                        "JP": 5390.9,
                                        "JO": 27.13,
                                        "KZ": 129.76,
                                        "KE": 32.42,
                                        "KI": 0.15,
                                        "KR": 986.26,
                                        "KW": 117.32,
                                        "KG": 4.44,
                                        "LA": 6.34,
                                        "LV": 23.39,
                                        "LB": 39.15,
                                        "LS": 1.8,
                                        "LR": 0.98,
                                        "LY": 77.91,
                                        "LT": 35.73,
                                        "LU": 52.43,
                                        "MK": 9.58,
                                        "MG": 8.33,
                                        "MW": 5.04,
                                        "MY": 218.95,
                                        "MV": 1.43,
                                        "ML": 9.08,
                                        "MT": 7.8,
                                        "MR": 3.49,
                                        "MU": 9.43,
                                        "MX": 1004.04,
                                        "MD": 5.36,
                                        "MN": 5.81,
                                        "ME": 3.88,
                                        "MA": 91.7,
                                        "MZ": 10.21,
                                        "MM": 35.65,
                                        "NA": 11.45,
                                        "NP": 15.11,
                                        "NL": 770.31,
                                        "NZ": 138,
                                        "NI": 6.38,
                                        "NE": 5.6,
                                        "NG": 206.66,
                                        "NO": 413.51,
                                        "OM": 53.78,
                                        "PK": 174.79,
                                        "PA": 27.2,
                                        "PG": 8.81,
                                        "PY": 17.17,
                                        "PE": 153.55,
                                        "PH": 189.06,
                                        "PL": 438.88,
                                        "PT": 223.7,
                                        "QA": 126.52,
                                        "RO": 158.39,
                                        "RU": 1476.91,
                                        "RW": 5.69,
                                        "WS": 0.55,
                                        "ST": 0.19,
                                        "SA": 434.44,
                                        "SN": 12.66,
                                        "RS": 38.92,
                                        "SC": 0.92,
                                        "SL": 1.9,
                                        "SG": 217.38,
                                        "SK": 86.26,
                                        "SI": 46.44,
                                        "SB": 0.67,
                                        "ZA": 354.41,
                                        "ES": 1374.78,
                                        "LK": 48.24,
                                        "KN": 0.56,
                                        "LC": 1,
                                        "VC": 0.58,
                                        "SD": 65.93,
                                        "SR": 3.3,
                                        "SZ": 3.17,
                                        "SE": 444.59,
                                        "CH": 522.44,
                                        "SY": 59.63,
                                        "TW": 426.98,
                                        "TJ": 5.58,
                                        "TZ": 22.43,
                                        "TH": 312.61,
                                        "TL": 0.62,
                                        "TG": 3.07,
                                        "TO": 0.3,
                                        "TT": 21.2,
                                        "TN": 43.86,
                                        "TR": 729.05,
                                        "TM": 0,
                                        "UG": 17.12,
                                        "UA": 136.56,
                                        "AE": 239.65,
                                        "GB": 2258.57,
                                        "US": 14624.18,
                                        "UY": 40.71,
                                        "UZ": 37.72,
                                        "VU": 0.72,
                                        "VE": 285.21,
                                        "VN": 101.99,
                                        "YE": 30.02,
                                        "ZM": 15.69,
                                        "ZW": 5.57
                                    }
                                }]
                            }
                        });
                    })
                </script>
            </div>
            <div class="site-report">
                <div class="alert-close3"> </div>
                <h3>Site Report</h3>
                <div class="skills-top">
                    <h5>Sales</h5>
                    <h4>65%</h4>
                    <div class="clearfix"></div>
                    <div class="skills">
                        <div class="skill" style="width:65%"></div>
                    </div>
                </div>
                <div class="skills-top">
                    <h5>Revenue</h5>
                    <h4>88%</h4>
                    <div class="clearfix"></div>
                    <div class="skills">
                        <div class="skill1" style="width:88%"></div>
                    </div>
                </div>
                <div class="skills-top">
                    <h5>New Orders</h5>
                    <h4>90%</h4>
                    <div class="clearfix"></div>
                    <div class="skills">
                        <div class="skill2" style="width:90%"></div>
                    </div>
                </div>
                <p>It is a long established fact that a re-ader will be distracted by the readable content of a page when looking at its layout.</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="total-sales">
            <div class="total-sale">
                <div class="alert-close5"> </div>
                <div id="recipes" style="100%; height:377px; margin: 0 auto"></div>
                <script>
                    $(function () {
                        $('#recipes').highcharts({

                            title: {
                                text: ' ',
                                style: {
                                    color: 'red',
                                    fontWeight: '100'

                                }
                            },

                            xAxis: {
                                categories: ['AUG', 'SEP', 'OCT', 'NOV', 'DEC', 'JAN'],

                            },

                            yAxis: {
                                labels: {
                                    formatter: function() {
                                        return this.value +'k'
                                    }
                                },
                                title: {
                                    enabled: false
                                }
                            },
                            plotOptions: {
                                series: {
                                    cursor: 'pointer',
                                    color: '#ec407a'
                                }
                            },

                            legend: {
                                enabled: false
                            },

                            tooltip: {
                                shared: true,
                                pointFormat: '{point.x} k',
                                backgroundColor: '#fff'
                            },

                            series: [{
                                data: [100, 200, 300, 6400, 500],
                                pointStart: 100
                            }]
                        });
                    });

                </script>

            </div>
            <div class="user-trends">
                <div class="alert-close7"> </div>
                <div id="myChart"></div>
                <script src="js/chart.js"></script>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="calenders">
            <div class="calender-left">
                <div class="alert-close"> </div>
                <h3>Calendar</h3>
                <form>
                    <input type="text" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                    <input type="text" class="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">
                    <textarea value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
                    <input type="submit" value="SEND"/>
                </form>
            </div>
            <div class="calender-right">
                <div class="alert-close1"> </div>
                <h3>Calendar</h3>
                <div class="column_right_grid calender">
                    <div class="cal1"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div>
                                <div class="month">March 2014</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div>
                            <table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days">
                                    <td class="header-day">Sun</td><td class="header-day">Mon</td><td class="header-day">Tu</td><td class="header-day">We</td><td class="header-day">T</td>
                                    <td class="header-day">Fr</td><td class="header-day">Su</td></tr></thead><tbody><tr><td class="day past adjacent-month last-month calendar-day-2014-02-23">
                                        <div class="day-contents">23</div></td><td class="day past adjacent-month last-month calendar-day-2014-02-24"><div class="day-contents">24</div></td>
                                    <td class="day past adjacent-month last-month calendar-day-2014-02-25"><div class="day-contents">25</div></td>
                                    <td class="day past adjacent-month last-month calendar-day-2014-02-26"><div class="day-contents">26</div></td>
                                    <td class="day past adjacent-month last-month calendar-day-2014-02-27"><div class="day-contents">27</div></td><td class="day past adjacent-month last-month calendar-day-2014-02-28"><div class="day-contents">28</div></td><td class="day past calendar-day-2014-03-01"><div class="day-contents">1</div></td></tr><tr><td class="day past calendar-day-2014-03-02"><div class="day-contents">2</div></td><td class="day past calendar-day-2014-03-03"><div class="day-contents">3</div></td><td class="day past calendar-day-2014-03-04"><div class="day-contents">4</div></td><td class="day past calendar-day-2014-03-05"><div class="day-contents">5</div></td><td class="day past calendar-day-2014-03-06"><div class="day-contents">6</div></td><td class="day past calendar-day-2014-03-07"><div class="day-contents">7</div></td><td class="day past calendar-day-2014-03-08"><div class="day-contents">8</div></td></tr><tr><td class="day past calendar-day-2014-03-09"><div class="day-contents">9</div></td><td class="day past event calendar-day-2014-03-10"><div class="day-contents">10</div></td><td class="day past event calendar-day-2014-03-11"><div class="day-contents">11</div></td><td class="day past event calendar-day-2014-03-12"><div class="day-contents">12</div></td><td class="day past event calendar-day-2014-03-13"><div class="day-contents">13</div></td><td class="day past event calendar-day-2014-03-14"><div class="day-contents">14</div></td><td class="day past calendar-day-2014-03-15"><div class="day-contents">15</div></td></tr><tr><td class="day past calendar-day-2014-03-16"><div class="day-contents">16</div></td><td class="day past calendar-day-2014-03-17"><div class="day-contents">17</div></td><td class="day past calendar-day-2014-03-18"><div class="day-contents">18</div></td><td class="day past calendar-day-2014-03-19"><div class="day-contents">19</div></td><td class="day past calendar-day-2014-03-20"><div class="day-contents">20</div></td><td class="day past event calendar-day-2014-03-21"><div class="day-contents">21</div></td><td class="day past event calendar-day-2014-03-22"><div class="day-contents">22</div></td></tr><tr><td class="day past event calendar-day-2014-03-23"><div class="day-contents">23</div></td><td class="day past calendar-day-2014-03-24"><div class="day-contents">24</div></td><td class="day today calendar-day-2014-03-25"><div class="day-contents">25</div></td><td class="day calendar-day-2014-03-26"><div class="day-contents">26</div></td><td class="day calendar-day-2014-03-27"><div class="day-contents">27</div></td><td class="day calendar-day-2014-03-28"><div class="day-contents">28</div></td><td class="day calendar-day-2014-03-29"><div class="day-contents">29</div></td></tr><tr><td class="day calendar-day-2014-03-30"><div class="day-contents">30</div></td><td class="day calendar-day-2014-03-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2014-04-01"><div class="day-contents">1</div></td><td class="day adjacent-month next-month calendar-day-2014-04-02"><div class="day-contents">2</div></td><td class="day adjacent-month next-month calendar-day-2014-04-03"><div class="day-contents">3</div></td><td class="day adjacent-month next-month calendar-day-2014-04-04"><div class="day-contents">4</div></td><td class="day adjacent-month next-month calendar-day-2014-04-05"><div class="day-contents">5</div></td></tr></tbody></table></div></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="cd-tabs">
            <nav>
                <ul class="cd-tabs-navigation">
                    <li><a data-content="fashion"  href="#0">Latest Comments <i> </i></a></li>
                    <li><a data-content="cinema" href="#0" class="selected fashion1">Latest Articles<i> </i></a></li>
                    <li><a data-content="television" href="#0" class="fashion2">Newest Users<i> </i></a></li>
                    <div class="clearfix"></div>
                </ul>
            </nav>
            <ul class="cd-tabs-content">
                <li data-content="fashion" >
                    <div class="top-men">
                        <div class="men">
                            <div class="grid-men">
                                <a href="#"><img src="images/pp.jpg" class="img-responsive" alt=""> </a>
                            </div>
                            <div class="men-grid">
                                <h6>on <a href="#">Fashion News</a> / by <a href="#">Jolia</a></h6>
                                <span>12-11-2014</span>
                                <p class="text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.      </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="men">
                            <div class="grid-men">
                                <a href="#"><img src="images/pp0.jpg" class="img-responsive" alt=""> </a>
                            </div>
                            <div class="men-grid">
                                <h6>on <a href="#">Technoloy News </a>/ by <a href="#">Deo</a></h6>
                                <span>12-11-2014</span>
                                <p class="text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.      </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="men">
                            <div class="grid-men">
                                <a href="#"><img src="images/pp01.jpg" class="img-responsive" alt=""> </a>
                            </div>
                            <div class="men-grid">
                                <h6>on<a href="#"> Fashion News</a> / by <a href="#">Jolia</a></h6>
                                <span>12-11-2014</span>
                                <p class="text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.      </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </li>
                <li data-content="cinema" class="selected">
                    <div class="top-men">
                        <div class="men">
                            <div class="grid-men">
                                <a href="#"><img src="images/pp0.jpg" class="img-responsive" alt=""> </a>
                            </div>
                            <div class="men-grid">
                                <h6>on <a href="#"> Fashion News </a>/ by <a href="#">Jolia</a></h6>
                                <span>12-11-2014</span>
                                <p class="text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.      </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="men">
                            <div class="grid-men">
                                <a href="#"><img src="images/pp01.jpg" class="img-responsive" alt=""> </a>
                            </div>
                            <div class="men-grid">
                                <h6>on <a href="#">Technoloy News</a> / by <a href="#">Deo</a></h6>
                                <span>12-11-2014</span>
                                <p class="text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.      </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="men">
                            <div class="grid-men">
                                <a href="#"><img src="images/pp.jpg" class="img-responsive" alt=""> </a>
                            </div>
                            <div class="men-grid">
                                <h6>on <a href="#"> Fashion News </a>/ by <a href="#">Jolia</a></h6>
                                <span>12-11-2014</span>
                                <p class="text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.      </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </li>
                <li data-content="television" >
                    <div class="top-men">
                        <div class="men">
                            <div class="grid-men">
                                <a href="#"><img src="images/pp01.jpg" class="img-responsive" alt=""> </a>
                            </div>
                            <div class="men-grid">
                                <h6>on <a href="#">Fashion News</a> / by <a href="#">Jolia</a></h6>
                                <span>12-11-2014</span>
                                <p class="text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.      </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="men">
                            <div class="grid-men">
                                <a href="#"><img src="images/pp.jpg" class="img-responsive" alt=""> </a>
                            </div>
                            <div class="men-grid">
                                <h6>on <a href="#">Technoloy News</a> / by <a href="#">Deo</a></h6>
                                <span>12-11-2014</span>
                                <p class="text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.      </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="men">
                            <div class="grid-men">
                                <a href="#"><img src="images/pp0.jpg" class="img-responsive" alt=""> </a>
                            </div>
                            <div class="men-grid">
                                <h6>on <a href="#">Fashion News </a>/ by <a href="#">Jolia</a></h6>
                                <span>12-11-2014</span>
                                <p class="text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.      </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </li>
                <div class="clearfix"></div>
            </ul>
        </div>

    </div>

    <div class="clearfix"></div>
</div>

<div class="footer">
    <div class="copyright text-center">
        <p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://www.js-css.cn/a/css/template/">网页模板</a></p>
    </div>
</div>
</body>
</html>