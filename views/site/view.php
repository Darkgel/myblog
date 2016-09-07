<?php
use yii\helpers\Html;
use app\assets\PostviewAsset;

$this->title = "文章标题";
PostviewAsset::register($this);
?>


<div id="article">
    <h1>源码编译安装lamp_第1篇(apache)</h1>
    <div id="article-body">
        <p>
            准备:
            <br>
            Linux操作系统（本次使用的为CentOS 6.5）
            <br>
            Apache源码包和较新版本的apr和apr-util (本次使用的为httpd-2.4.20 , apr-1.5.2 , apr-util-1.5.4)
            <br>
            安装好编译环境:
            <br>
            yum groupinstall "Development Tools" "Additional Development"
            <br>
            依赖pcre-devel 可以直接yum -y install pcre-devel (安装中遇到若有依赖的程序包未安装可用此方法安装”yum -y install [程序包]-devel”
        </p>
        <p>
            方法/步骤:
            <br>
            1
            <br>
            首先下载最新版的Apache源码包，因为2.4版的httpd需要较新版本的apr支持，所以需要先安装新版本的apr以及apr-util。
        </p>
        <p>
        <p># tar jxvf apr-1.5.2.tar.bz2 # cd apr-1.5.1 # ./configure --prefix=/usr/local/apr # make && make install</p>
        <p>编译安装apr-util：</p>
        <p># tar jxvf apr-util-1.5.4.tar.bz2 # cd apr-util-1.5.4 # ./configure --prefix=/usr/local/apr-util --with-apr=/usr/local/apr # make && make install</p>
        <p>
        <p>#tar jvxf httpd-2.4.20.tar.bz2 # cd httpd-2.4.20 # ./configure --prefix=/usr/local/apache \ --sysconfdir=/etc/httpd --enable-so --enable-ssl \ --enable-cgi --enable-rewrite --with-zlib --with-pcre \ --with-apr=/usr/local/apr --with-apr-util=/usr/local/apr-util \ --enable-modules=most # make && make install</p>
        <p> </p>
        <p> </p>
        <p>
        <p>
        <p># cp /usr/local/apache/bin/apachectl /etc/init.d/httpd 添加进环境变量： # echo 'export PATH=$PATH:/usr/local/apache/bin' > \ /etc/profile.d/httpd.sh # chmod +x /etc/profile.d/httpd.sh # source /etc/profile.d/httpd.sh</p>
        <p> </p>
        <p> </p>
        <p>
        <p># vim /etc/httpd/httpd.conf</p>
        <p>1</p>
        <p>
        <p>
        <p># service httpd start</p>
        <p>1</p>
        <p>查看是否正常监听80端口：</p>
        <p># netstat -anpt | grep "80"</p>
        <p>1</p>
        <p>
        <p>#setenforce 0 # service iptables stop</p>
        <p>1</p>
        <p>2</p>
        <p>a.防火墙的问题:</p>
        <p>/etc/init.d/iptables status 会得到一系列信息，说明防火墙开着。 /etc/init.d/iptables stop(暂时关闭) 永久关闭防火墙: chkconfig --level 35 iptables off</p>
        <p> </p>
        <p>5</p>
        <p>b.防火墙的长久解决方法(允许80端口)如下：</p>
        <p>/sbin/iptables -I INPUT -p tcp --dport 80 -j ACCEPT 然后保存： /etc/rc.d/init.d/iptables save 重启防火墙 /etc/init.d/iptables restart</p>
        <p> </p>
        <p> </p>
        <p>
        <p>查看当前SELinux状态： /usr/sbin/sestatus -v getenforce ##也可以用这个命令检查 编辑/etc/selinux/config，找到SELINUX 行修改成为：SELINUX=disabled: # This file controls the state of SELinux on the system. # SELINUX= can take one of these three values: # enforcing - SELinux security policy is enforced. # permissive - SELinux prints warnings instead of enforcing. # disabled - No SELinux policy is loaded. **SELINUX=disabled** # SELINUXTYPE= can take one of these two values: # targeted - Only targeted network daemons are protected. # strict - Full SELinux protection. SELINUXTYPE=targeted 重启系统。</p>
        <p> </p>
        <p> </p>
        <p>Centos还提供了实时改变SELinux工作模式的工具，前提是SELinux没有被disabled掉的时候</p>
        <p>/usr/sbin/setenforce 0 #使SELinux工作模式变成permissive模式 /usr/sbin/setenforce 1 #使SELinux工作模式变成enforcing模式 添加到系统默认启动脚本里面 echo "/usr/sbin/setenforce 0" >> /etc/rc.local 这样就可以实时控制SELinux的启用和不启用了。</p>
        <p> </p>
        <p> </p>
        <p>
        <p>
        <p>
        <p># vim /etc/init.d/httpd 在第二行下添加：# chkconfig:235 85 15 #description: This is apache server! 加入开机自启： # chkconfig --add httpd</p>
        <p> </p>
        <p>
        <p>
        <p>ServerRoot "/usr/local/apache"// Apache的安装目录 ServerName localhost // 服务名称，可以填主机名 Listen 80 // 服务监听端口，默认80 LoadModule // 服务启动需要加载的模块 User daemon // apache进程执行者 Group deamon // 执行者的属组 ServerAdmin you@example.com // 管理员的邮箱地址 DocumentRoot "/usr/local/apache/htdocs" // 网站根目录 ErrorLog "logs/error_log" // Apache运行产生的错误日志 LogLevel warn // 指定ErrorLog会记录的错误的级别 DirectoryIndex index.html // 网站目录索引文件</p>
        <p> </p>
        <p>
        <p># httpd -t 或者：# service httpd configtest</p>
        <p>1</p>
        <p>
        <p># httpd -k restart 或者：# service httpd restart 或者只提醒服务重新读取配置文件： # httpd -k graceful 或者：# service httpd graceful 如果想关闭服务： # httpd -k stop 或者：# service httpd stop</p>
        <p></p>
        <br>
        <br>
    </div>


    <div id="article-footer">
        <div id="vote">
            <a href="#" id="approve">赞成(3)</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#" id="against">反对(1)</a>
        </div>
        <div>
            <p id="article-class">
                &nbsp;&nbsp;分类 : PHP,Yii
            </p>
            <p id="article-tags">
                标签 : lamp linux apache
            </p>
        </div>
        <br /><br />
        <div>
            <p id="backward">
                &nbsp;&nbsp;上一篇 : <a href="#">hello world</a>
            </p>
            <p id="forward">
                下一篇 : <a href="#">i am darkgel</a>
            </p>
        </div>
        <br /><br />
        <div id="other-details">
            <span>posted @ 2016-04-28 08:57 阅读(203) 评论(0) <a href="#">编辑</a></span>
        </div>
    </div>
</div>

<div id="comments">
    <h3>&nbsp;评论列表</h3>
    <ul class="media-list">
        <li class="media">
            <div class="media-object pull-left">
                <?=Html::img("@web/img/user.png");?>
            </div>
            <div class="media-body">
                <h5 class="media-heading">
                    darkgel&nbsp;
                    <a href="mailto:darkgel@163.com">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </a>&nbsp;
                    <span>2016-04-28 08:57</span>
                </h5>
                <div>我是W3cplus站长大漠，我在写Bootstrap框中的媒体对象测试用例</div>
                <div class="reply"><a href="#">回复</a></div>
            </div>
        </li>
        <li class="media">
            <div class="media-object pull-left">
                <?=Html::img("@web/img/user.png");?>
            </div>
            <div class="media-body">
                <h5 class="media-heading">
                    darkgel&nbsp;
                    <a href="mailto:darkgel@163.com">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </a>&nbsp;
                    <span>2016-04-28 08:57</span>
                </h5>
                <div>我是W3cplus站长大漠，我在写Bootstrap框中的媒体对象测试用例</div>
                <div class="reply"><a href="#">回复</a></div>
                <!--     reply begin           -->
                <br/>
                <ul class="media-list">
                    <li class="media">
                        <div class="media-object pull-left">
                            <?=Html::img("@web/img/user.png");?>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">
                                darkgel&nbsp;
                                <a href="mailto:darkgel@163.com">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </a>&nbsp;
                                回复&nbsp;los&nbsp;
                                <span>2016-04-28 08:57</span>
                            </h5>
                            <div>我是W3cplus站长大漠，我在写Bootstrap框中的媒体对象测试用例</div>
                            <div class="reply"><a href="#">回复</a></div>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-object pull-left">
                            <?=Html::img("@web/img/user.png");?>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">
                                darkgel&nbsp;
                                <a href="mailto:darkgel@163.com">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </a>&nbsp;
                                回复&nbsp;los&nbsp;
                                <span>2016-04-28 08:57</span>
                            </h5>
                            <div>我是W3cplus站长大漠，我在写Bootstrap框中的媒体对象测试用例</div>
                            <div class="reply"><a href="#">回复</a></div>
                        </div>
                    </li>
                </ul>
                <!--     reply end           -->
            </div>
        </li>
        <li class="media">
            <div class="media-object pull-left">
                <?=Html::img("@web/img/user.png");?>
            </div>
            <div class="media-body">
                <h5 class="media-heading">
                    darkgel&nbsp;
                    <a href="mailto:darkgel@163.com">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </a>&nbsp;
                    <span>2016-04-28 08:57</span>
                </h5>
                <div>我是W3cplus站长大漠，我在写Bootstrap框中的媒体对象测试用例</div>
                <div class="reply"><a href="#">回复</a></div>
            </div>
        </li>
    </ul>
</div>

<div id="new-comments">
    <h3>&nbsp;发表评论</h3>
    <form role="form" action="#">
        <div class="form-group">
            <label for="comment-content">您的评论</label>
            <textarea class="form-control" rows="8" id="comment-content" placeholder="请在这里写下您的评论"></textarea>
        </div>
        <div class="form-group">
            <label for="comment-author">评论人</label>
            <input type="text" class="form-control" id="comment-author" placeholder="如何称呼您" >
        </div>
        <div class="form-group">
            <label for="email">邮箱(选填)&nbsp;&nbsp;&nbsp;备注:您的邮箱将不会被公开,若您留下邮箱,当有人回复您的评论时可以将回复发送到您的邮箱</label>
            <input type="email" class="form-control" id="email" placeholder="请输入您的邮箱地址">
        </div>
        <button type="submit" class="btn btn-success">提交评论</button>
    </form>
</div>