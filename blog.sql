/*
Navicat MySQL Data Transfer

Source Server         : mycloud
Source Server Version : 50631
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50631
File Encoding         : 65001

Date: 2017-05-03 09:16:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `nickname` varchar(16) CHARACTER SET utf8mb4 NOT NULL COMMENT '昵称',
  `phone` char(11) CHARACTER SET utf8mb4 NOT NULL COMMENT '手机号',
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '密码',
  `pass_salt` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '密码盐值',
  `feeling` varchar(32) DEFAULT NULL COMMENT '心情',
  `icon` varchar(255) DEFAULT NULL COMMENT '头像',
  `reg_time` int(11) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nickname` (`nickname`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('2', '景色铅华', '18128167616', '30124759b6a895835e28fa550e8c6a02', 'jork', '让一切随风！', 'Public/Upload/icon/icon.jpg', '1490838978');

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '用户id',
  `category_id` int(10) unsigned NOT NULL COMMENT '分类id',
  `subject` varchar(32) CHARACTER SET utf8mb4 NOT NULL COMMENT '标题',
  `summary` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT '文章摘要',
  `cover` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '封面',
  `create_time` int(11) unsigned NOT NULL,
  `modify_time` int(11) unsigned DEFAULT NULL,
  `top` tinyint(3) unsigned DEFAULT '0' COMMENT '是否推荐',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '发表状态',
  PRIMARY KEY (`id`),
  KEY `ctime` (`create_time`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='blog表';

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '2', '3', '在本地进行上传图片的预览', '当我们在本地进行图片上传时，如何才能进行本地即时预览？仅仅需要这几行javascript代码即可', 'Public/Upload/20170331/58de14dc1afed.jpg', '1490949340', '1491794524', '1', '1');
INSERT INTO `article` VALUES ('4', '2', '6', '在centOS7下安装Nginx PHP7 mysql5.6', '对小鲜肉程序猿来说，在Linux下安装NMP还是有点难度的，特别是centOS7后有些指令都发生了改变，所以我就把自己遇到的坑写下来，说不定将来得了老年痴呆时还可以看看。', 'Public/Upload/20170407/58e7545aa8b13.jpg', '1491555418', null, '1', '1');
INSERT INTO `article` VALUES ('5', '2', '1', '周末电影大放送', '来来来！我们看的不是电影，是风景！', 'Public/Upload/20170407/58e76ca3ae578.jpg', '1491561017', '1493704343', '1', '1');
INSERT INTO `article` VALUES ('10', '2', '1', '达康书记别低头，GDP会掉', '最近一部国产反腐剧火遍各大平台，网友们都说一下子看到这么多老戏骨在飙戏，感觉自己看了部假的国产剧。这也是挺讽刺的，在如今这个中国影视圈里，逮谁都说自己是演员。但是有些演员的表演看的我是尴尬癌都犯了，片酬却动辄几千万以上。与其说这部《人民的名义》质量高，不如说是我们在大环境中已经降低了自己的要求，我们有什么办法？我们也很绝望啊！', 'Public/Upload/20170412/58eda09575053.jpg', '1491968149', '1493704454', '1', '1');
INSERT INTO `article` VALUES ('11', '2', '9', 'laravel开发微信公众号里的坑', '最近闲来没事想学习学习laravel框架和微信公众号的开发，可是啊，坑一个接着一个的来，让我倍感痛苦，特写此文记录之。希望后人不要重蹈覆辙！', 'Public/Upload/20170414/58f041e728717.jpg', '1492140519', '1492916029', '1', '1');
INSERT INTO `article` VALUES ('12', '2', '9', 'laravel里使用php artisan 命令发生错误', '如果在使用artisan命令时出现以上错误，多半是由于下面的原因造成的', 'Public/Upload/20170419/58f7193f8a969.jpg', '1492588863', null, '0', '1');
INSERT INTO `article` VALUES ('13', '2', '1', '家庭，沉甸甸的两字时刻在心中', '最近都没看电影了，一是无奈于没什么好的新电影上线，二是在看一部国产剧《人民的名义》，三是玩王者荣耀去了，哈哈，被虐的不要不要的。这次的话题是“家庭”。不动声色，流露于内心。其实我是最近才想着去看看家庭类的剧情片，可能跟我越来越老了有关，毕竟不年轻了。', 'Public/Upload/20170422/58fb02753e427.jpg', '1492845173', '1493704542', '1', '1');
INSERT INTO `article` VALUES ('14', '2', '7', '妹纸征男友', '现有单身妹纸一枚，欢迎各大男士前来处对象，要求见内容', 'Public/Upload/20170423/58fc6cdcd529f.jpg', '1492937948', '1493704577', '1', '1');
INSERT INTO `article` VALUES ('15', '2', '6', '处理centos7下中文显示乱码问题', '有时候在云服务器上的主机是默认英文的，我们在查看中文是就会显示乱码，写中文也会是乱码，估计默认是拉丁编码吧，下面方法就可以让中文显示正常', 'Public/Upload/20170426/59004e6de129a.jpg', '1493192301', '1493195085', '0', '1');

-- ----------------------------
-- Table structure for article_content
-- ----------------------------
DROP TABLE IF EXISTS `article_content`;
CREATE TABLE `article_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL COMMENT '博客id',
  `content` text CHARACTER SET utf8mb4 NOT NULL COMMENT '博客内容',
  `img` text COMMENT '序列化的图片地址',
  PRIMARY KEY (`id`),
  KEY `bid` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='blog内容';

-- ----------------------------
-- Records of article_content
-- ----------------------------
INSERT INTO `article_content` VALUES ('1', '1', '<pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"javascript hljs\" codemark=\"1\"><span class=\"hljs-comment\">//上传图片即时预览</span>\r\n        $(<span class=\"hljs-string\">\'#inputCover\'</span>).change(<span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span>(<span class=\"hljs-params\"></span>)</span>{\r\n            $(<span class=\"hljs-keyword\">this</span>).parent().find(<span class=\"hljs-string\">\'img\'</span>).remove();\r\n            <span class=\"hljs-keyword\">var</span> objUrl = getObjectURL(<span class=\"hljs-keyword\">this</span>.files[<span class=\"hljs-number\">0</span>]) ;\r\n            <span class=\"hljs-keyword\">if</span> (objUrl) {\r\n                <span class=\"hljs-keyword\">var</span> img = <span class=\"hljs-string\">\'<img src=\"\'</span>+ objUrl +<span class=\"hljs-string\">\'\" style=\"display: block;width: 500px\"/><br>\'</span>;\r\n                $(<span class=\"hljs-keyword\">this</span>).parent().prepend(img);\r\n            }\r\n        });\r\n\r\n        <span class=\"hljs-comment\">//建立一個可存取到該file的url</span>\r\n        <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">getObjectURL</span>(<span class=\"hljs-params\">file</span>) </span>{\r\n            <span class=\"hljs-keyword\">var</span> url = <span class=\"hljs-literal\">null</span> ;\r\n            <span class=\"hljs-keyword\">if</span> (<span class=\"hljs-built_in\">window</span>.createObjectURL!=<span class=\"hljs-literal\">undefined</span>) { <span class=\"hljs-comment\">// basic</span>\r\n                url = <span class=\"hljs-built_in\">window</span>.createObjectURL(file) ;\r\n            } <span class=\"hljs-keyword\">else</span> <span class=\"hljs-keyword\">if</span> (<span class=\"hljs-built_in\">window</span>.URL!=<span class=\"hljs-literal\">undefined</span>) { <span class=\"hljs-comment\">// mozilla(firefox)</span>\r\n                url = <span class=\"hljs-built_in\">window</span>.URL.createObjectURL(file) ;\r\n            } <span class=\"hljs-keyword\">else</span> <span class=\"hljs-keyword\">if</span> (<span class=\"hljs-built_in\">window</span>.webkitURL!=<span class=\"hljs-literal\">undefined</span>) { <span class=\"hljs-comment\">// webkit or chrome</span>\r\n                url = <span class=\"hljs-built_in\">window</span>.webkitURL.createObjectURL(file) ;\r\n            }\r\n            <span class=\"hljs-keyword\">return</span> url ;\r\n        }</code></pre><blockquote><p>如此简单，我竟不会，果然还有很长的路要走啊</p></blockquote><p><br></p><p><br></p>', 's:0:\"\";');
INSERT INTO `article_content` VALUES ('4', '4', '<p><br></p><h3>systemctl start php-fpm.service<font color=\"#008080\">1.准备工作</font></h3><hr><p>首先确保你的Linux可以联网，否则解决依赖可以让你砸电脑</p><blockquote><p>软件所需要的所有依赖，别管有用没用，装了再说</p></blockquote><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">yum install -y gcc gcc-c++ cmake openssl openssl-devel pcre pcre-devel libaio libaio-devel bison bison-devel ncurses ncurses-devel openldap openldap-devel bzip2 bzip2-devel bzip2-libs libxml2 libxml2-devel curl curl-devel libjpeg libjpeg-devel libpng libpng-devel freetype freetype-devel libtool libtool-ltdl libtool-ltdl-devel libevent libevent-devel ImageMagick ImageMagick-c++ ImageMagick-c++-devel unixODBC unixODBC-devel tsocks screen lrzsz ntpdate make wget sqlite sqlite-devel subversion intltool openssh-clients readline-devel gd-devel wget autoconf zlib zlib-devel glibc glibc-devel e2fsprogs e2fsprogs-devel krb5-devel   nss_ldap  libXpm* git</code></pre><p>成功之后你就成功了一半了，然后去官网下载nginx,php,mysql</p><p><a href=\"https://nginx.org/\" target=\"_blank\">nginx</a><br></p><p><a href=\"https://secure.php.net/downloads.php\" target=\"_blank\">PHP</a><br></p><p><a href=\"https://dev.mysql.com/downloads/mysql/\" target=\"_blank\">mysql</a><br></p><p>下载完成后把他们用xftp传到linux上，我是在自己家目录新建一个package文件夹来放源码包</p><h3><font color=\"#008080\">2.安装nginx</font></h3><hr><h4><font color=\"#000000\">解压 &nbsp; </font><font color=\"#800080\">&nbsp;</font></h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">tar zxvf nginx-1.10.1.tar.gz</code></pre><h4>进入目录 &nbsp; &nbsp;</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> nginx-1.10.1</code></pre><h4>创建nginx使用的www用户和www组</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">groupadd  www \r\n</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">useradd -g  www www</code></pre><h4>配置</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">./configure --user=www --group=www --prefix=/usr/<span class=\"hljs-built_in\">local</span>/nginx --with-http_stub_status_module --with-http_ssl_module --with-http_realip_module</code></pre><p>--user=www&nbsp;:&nbsp;表示该软件所属用户www\r\n</p><p>--group=www:表示该软件所属组www</p><h4>编译&amp;安装</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">make &amp;&amp; make install</code></pre><h4>完了之后，检查是否安装成功</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span>  /usr/<span class=\"hljs-built_in\">local</span>/nginx/sbin</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">./nginx -t</code></pre><p>如果输出显示：</p><p><font face=\"Consolas\">nginx:&nbsp;the&nbsp;configuration&nbsp;file&nbsp;/usr/local/nginx/conf/nginx.conf&nbsp;syntax&nbsp;is&nbsp;ok\r\n</font></p><p><font face=\"Consolas\">nginx:&nbsp;configuration&nbsp;file&nbsp;/usr/local/nginx/conf/nginx.conf&nbsp;test&nbsp;is&nbsp;successful</font></p><p>说明成功了</p><blockquote><p>开机启动</p></blockquote><h4>创建nginx启动命令脚本</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">vi /lib/systemd/system/nginx.service</code></pre><h4><p>插入以下内容,&nbsp;注意修改PATH和NAME字段,&nbsp;匹配自己的安装路径</p><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">[Unit]\r\nDescription=nginx\r\nAfter=network.target\r\n[Service]\r\nType=forking\r\nExecStart=/usr/<span class=\"hljs-built_in\">local</span>/nginx/sbin/nginx -c /usr/<span class=\"hljs-built_in\">local</span>/nginx/conf/nginx.conf\r\nExecReload=/usr/<span class=\"hljs-built_in\">local</span>/nginx/sbin/nginx <span class=\"hljs-_\">-s</span> reload\r\nExecStop=/usr/<span class=\"hljs-built_in\">local</span>/nginx/sbin/nginx <span class=\"hljs-_\">-s</span> quit\r\nPrivateTmp=<span class=\"hljs-literal\">true</span>\r\n[Install]\r\nWantedBy=multi-user.target</code></pre></h4><h4>内容解释</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">[Unit]:服务的说明\r\n\r\nDescription:描述服务\r\n\r\nAfter:描述服务类别\r\n\r\n[Service]服务运行参数的设置\r\n\r\nType=forking是后台运行的形式\r\n\r\nExecStart为服务的具体运行命令\r\n\r\nExecReload为重启命令\r\n\r\nExecStop为停止命令\r\n\r\nPrivateTmp=True表示给服务分配独立的临时空间\r\n\r\n注意：[Service]的启动、重启、停止命令全部要求使用绝对路径\r\n\r\n[Install]运行级别下服务安装的相关设置，可设置为多用户，即系统运行级别为3</code></pre><h4><p>对nginx服务执行停止/启动/重新读取配置文件操作</p><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-comment\">启动nginx服务</span>\r\nsystemctl start nginx.service\r\n<span class=\"hljs-comment\">停止nginx服务</span>\r\nsystemctl stop nginx.service\r\n<span class=\"hljs-comment\">重启nginx服务</span>\r\nsystemctl restart nginx.service\r\n<span class=\"hljs-comment\">重新读取nginx配置(这个最常用, 不用停止nginx服务就能使修改的配置生效)</span>\r\nsystemctl reload nginx.service\r\n<span class=\"hljs-comment\">查看状态</span>\r\nsystemctl status nginx.service</code></pre></h4><h4><p>防火墙开启80端口</p><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">firewall-cmd --permanent --zone=public --add-port=80/tcp</code></pre></h4><h4><p>配置Nginx支持php</p><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">vi /usr/<span class=\"hljs-built_in\">local</span>/nginx/conf/nginx.conf</code></pre></h4><h4><p>首行user去掉注释,修改Nginx运行组为www&nbsp;www；必须与/usr/local/php/etc/php-fpm.d/www.conf中的user,group配置相同，否则php运行出错</p><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">user  www  www</code></pre></h4><h4>添加index.php</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">index  index.php  index.html index.htm </code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">location ~ \\.php$ {    \r\n  <span class=\"hljs-comment\">#root          html;#此处和server下面root保持一致,默认为html    </span>\r\n  fastcgi_pass  127.0.0.1:9000;    \r\n  fastcgi_index  index.php;    \r\n  fastcgi_param SCRIPT_FILENAME <span class=\"hljs-variable\">$document_root</span><span class=\"hljs-variable\">$fastcgi_script_name</span>;  \r\n  include        fastcgi_params; \r\n}</code></pre><h4><p>重启nginx</p><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">systemctl restart nginx.service</code></pre></h4><h4>nginx下的thinkphp的URL重写规则</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">location /project/ {&nbsp;&nbsp;&nbsp;&nbsp;#project是你项目文件夹的名称\r\n	index  index.php;\r\n		<span class=\"hljs-keyword\">if</span> (!<span class=\"hljs-_\">-e</span> <span class=\"hljs-variable\">$request_filename</span>) {\r\n		rewrite  ^/project/(.*)$  /project/index.php/<span class=\"hljs-variable\">$1</span>  last;\r\n		<span class=\"hljs-built_in\">break</span>;\r\n	}\r\n}\r\n\r\nlocation ~ .+\\.php($|/) {\r\n	<span class=\"hljs-built_in\">set</span> <span class=\"hljs-variable\">$script</span>    <span class=\"hljs-variable\">$uri</span>;\r\n	<span class=\"hljs-built_in\">set</span> <span class=\"hljs-variable\">$path_info</span>  <span class=\"hljs-string\">\"/\"</span>;\r\n	<span class=\"hljs-keyword\">if</span> (<span class=\"hljs-variable\">$uri</span> ~ <span class=\"hljs-string\">\"^(.+\\.php)(/.+)\"</span>) {\r\n		<span class=\"hljs-built_in\">set</span> <span class=\"hljs-variable\">$script</span>     <span class=\"hljs-variable\">$1</span>;\r\n		<span class=\"hljs-built_in\">set</span> <span class=\"hljs-variable\">$path_info</span>  <span class=\"hljs-variable\">$2</span>;\r\n	}\r\n\r\n	fastcgi_pass 127.0.0.1:9000;\r\n	fastcgi_index  index.php?IF_REWRITE=1;\r\n	include /usr/<span class=\"hljs-built_in\">local</span>/nginx/conf/fastcgi_params;\r\n	fastcgi_param PATH_INFO <span class=\"hljs-variable\">$path_info</span>;\r\n	fastcgi_param SCRIPT_FILENAME  <span class=\"hljs-variable\">$document_root</span>/<span class=\"hljs-variable\">$script</span>;\r\n	fastcgi_param SCRIPT_NAME <span class=\"hljs-variable\">$script</span>;\r\n}</code></pre><h3><font color=\"#008080\"><br></font></h3><h3><font color=\"#008080\">3.安装PHP</font></h3><hr><blockquote><p>准备工作,安装libiconv</p></blockquote><p>加强系统对支持字符编码转换的功能</p><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> /usr/<span class=\"hljs-built_in\">local</span>/src</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">wget http://ftp.gnu.org/gnu/libiconv/libiconv-1.14.tar.gz</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">tar zvxf libiconv-1.14.tar.gz</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> libiconv-1.14</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">./configure </code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> srclib</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">sed -i <span class=\"hljs-_\">-e</span> <span class=\"hljs-string\">\'/gets is a security/d\'</span> ./stdio.in.h</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> ..</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">make &amp;&amp; make install</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">ln -sf /usr/<span class=\"hljs-built_in\">local</span>/lib/libiconv.so.2 /usr/lib64/</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">ldconfig</code></pre><h4><blockquote><p>安装libmcrypt&nbsp;(包含libltdl)</p></blockquote></h4><h5>加密算法库，PHP扩展mcrypt功能对此库有依赖关系</h5><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> /usr/<span class=\"hljs-built_in\">local</span>/src</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">wget http://sourceforge.net/projects/mcrypt/files/Libmcrypt/2.5.8/libmcrypt-2.5.8.tar.gz</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">tar zvxf libmcrypt-2.5.8.tar.gz</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> libmcrypt-2.5.8</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">./configure &amp;&amp; make &amp;&amp; make install</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> libltdl/</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">./configure --enable-ltdl-install</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">make &amp;&amp; make install</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">ln -sf /usr/<span class=\"hljs-built_in\">local</span>/lib/libmcrypt.* /usr/lib64/</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">ln -sf /usr/<span class=\"hljs-built_in\">local</span>/bin/libmcrypt-config /usr/lib64/</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">ldconfig</code></pre><blockquote><p>安装mcrypt&nbsp;(依赖libmcrypt和mhash)</p></blockquote><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> /usr/<span class=\"hljs-built_in\">local</span>/src/</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">wget http://sourceforge.net/projects/mcrypt/files/MCrypt/2.6.8/mcrypt-2.6.8.tar.gz</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">tar zvxf mcrypt-2.6.8.tar.gz</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> mcrypt-2.6.8</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">./configure &amp;&amp; make &amp;&amp; make install</code></pre><blockquote><p>安装re2c</p></blockquote><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> /usr/<span class=\"hljs-built_in\">local</span>/src/</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">wget http://sourceforge.net/projects/re2c/files/0.16/re2c-0.16.tar.gz</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">tar zvxf re2c-0.16.tar.gz</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> re2c-0.16</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">./configure &amp;&amp; make &amp;&amp; make install</code></pre><blockquote><p>创建ldap软连接</p></blockquote><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">ln <span class=\"hljs-_\">-s</span> /usr/lib64/libldap* /usr/lib</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">ln <span class=\"hljs-_\">-s</span> /usr/lib64/liblber* /usr/lib</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">ldconfig</code></pre><blockquote><p>解压缩php</p></blockquote><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">tar zxvf php-7.1.2.tar.gz</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> php-7.1.2</code></pre><h4>配置注意（注意安装的路径和配置文件php.ini存放的路径）</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">./configure --prefix=/usr/<span class=\"hljs-built_in\">local</span>/php --with-config-file-path=/usr/<span class=\"hljs-built_in\">local</span>/php/etc --with-zlib --with-mysqli --with-pdo-mysql --enable-mbstring --with-gd --with-png-dir=/usr/lib64 --with-jpeg-dir=/usr/lib64 --with-freetype-dir=/usr/lib64 --enable-libxml --enable-xml --enable-bcmath --enable-shmop --enable-sysvsem --enable-inline-optimization --enable-opcache --enable-mbregex --enable-fpm --enable-ftp --enable-gd-native-ttf --with-openssl --enable-pcntl --enable-sockets --with-xmlrpc --enable-zip --enable-soap --without-pear --with-gettext --enable-session --with-curl --enable-ctype</code></pre><h4><p>编译，安装</p><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">make ZEND_EXTRA_LIBS=<span class=\"hljs-string\">\'-liconv\'</span> &amp;&amp; make install</code></pre></h4><h4><p>添加PHP配置文件</p><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">cp php.ini-development /usr/<span class=\"hljs-built_in\">local</span>/php/etc/php.ini</code></pre></h4><h4>修改php配置文件，支持ZendOpcache</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">vim /usr/<span class=\"hljs-built_in\">local</span>/php/etc/php.ini</code></pre><p>找到extension_dir 修改为：</p><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">extension_dir = <span class=\"hljs-string\">\"/usr/local/php/lib/php/extensions/no-debug-non-zts-20160303/\"</span></code></pre><p>加载扩展</p><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">zend_extension=<span class=\"hljs-string\">\"opcache.so\"</span></code></pre><blockquote><p>配置opcache参考php手册，在php.ini里去掉注释填上你认为合适的值即可</p></blockquote><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">:wq    #保存退出</code></pre><blockquote><p>生成php-fpm配置文件</p></blockquote><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">cp /usr/<span class=\"hljs-built_in\">local</span>/php/etc/php-fpm.conf.default /usr/<span class=\"hljs-built_in\">local</span>/php/etc/php-fpm.conf</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">cp /usr/<span class=\"hljs-built_in\">local</span>/php/etc/php-fpm.d/www.conf.default /usr/<span class=\"hljs-built_in\">local</span>/php/etc/php-fpm.d/www.conf</code></pre><h4>配置www.conf</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">vim /usr/<span class=\"hljs-built_in\">local</span>/php/etc/php-fpm.d/www.conf</code></pre><h4>修改内容，并且让其它生效.[user和group根据实际情况修改]</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">user = nobody\r\ngroup = nobody\r\npm.max_children = 35\r\npm.start_servers = 20\r\npm.min_spare_servers = 5\r\npm.max_spare_servers = 35\r\n:wq     #保存退出</code></pre><blockquote><p>设置开机自启动</p></blockquote><h4>在系统服务目录里创建php-fpm.service文件</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">vim /etc/systemd/system/php-fpm.service</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">[Unit]\r\nDescription=php-fpm\r\nAfter=network.target\r\n[Service]\r\nType=forking\r\nExecStart=/usr/<span class=\"hljs-built_in\">local</span>/php/sbin/php-fpm\r\nPrivateTmp=<span class=\"hljs-literal\">true</span>\r\n[Install]\r\nWantedBy=multi-user.target</code></pre><h4>启动php-fpm</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">systemctl start php-fpm.service</code></pre><h4>开机自启php-fpm</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">systemctl <span class=\"hljs-built_in\">enable</span> php-fpm.service</code></pre><h4>查看php-fpm状态</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">systemctl status php-fpm.service</code></pre><p><br></p><h3><p><font color=\"#008080\">4.安装MySQL</font></p></h3><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">tar zxvf mysql-5.6.31.tar.gz</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> mysql-5.6.31</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">cmake . -DCMAKE_INSTALL_PREFIX=/usr/<span class=\"hljs-built_in\">local</span>/mysql -DMYSQL_DATADIR=/usr/<span class=\"hljs-built_in\">local</span>/mysql/data</code></pre><h4>下面这步请耐心等待</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">make &amp;&amp; make install</code></pre><h4><p>配置MySQL</p><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">cd</span> /usr/<span class=\"hljs-built_in\">local</span>/mysql</code></pre></h4><h4>创建用户和组管理mysql</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">groupadd mysql</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">useradd -r -g mysql mysql</code></pre><h4>修改所属者和组</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">chown -R mysql .</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">chgrp -R mysql .</code></pre><h4>删除可能的旧的/etc/my.cnf</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">rm <span class=\"hljs-_\">-f</span> /etc/my.cnf</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">./scripts/mysql_install_db --user=mysql</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">chown -R root .</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">chown -R mysql data</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">cp support-files/my-default.cnf /etc/my.cnf</code></pre><blockquote><p>开机自启</p></blockquote><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">cp support-files/mysqld /etc/init.d/mysqld</code></pre><h4>如果supprort-files下没有mysqld文件的话，那就复制mysql.server</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">cp support-files/mysql.server /etc/init.d/mysqld</code></pre><h4>添加到服务</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">chkconfig --add mysqld</code></pre><h4>启动mysqld</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">bin/mysqld_safe --user=mysql &amp;</code></pre><h4>客户端登录</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">/usr/local/mysql/bin/mysql</code></pre><h4>初始无密码，登陆后可以重置root密码</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"sql hljs\" codemark=\"1\"><span class=\"hljs-keyword\">use</span> mysql;</code></pre><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"sql hljs\" codemark=\"1\"><span class=\"hljs-keyword\">update</span> mysql.<span class=\"hljs-keyword\">user</span> <span class=\"hljs-keyword\">set</span> <span class=\"hljs-keyword\">password</span>=<span class=\"hljs-keyword\">password</span>(<span class=\"hljs-string\">\'root\'</span>) <span class=\"hljs-keyword\">where</span> <span class=\"hljs-keyword\">user</span>=<span class=\"hljs-string\">\'root\'</span>;</code></pre><h4>刷新权限</h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"sql hljs\" codemark=\"1\"><span class=\"hljs-keyword\">FLUSH</span> <span class=\"hljs-keyword\">PRIVILEGES</span>;</code></pre><h4><b><font color=\"#ff00ff\">如果到这里都没问题的话，恭喜你，你可以ctrl + c 退出mysql了，你已经成功安装Web环境了！</font></b></h4><p>有问题可以找我 QQ：928773302 &nbsp;不过我也是菜鸟</p>', 's:0:\"\";');
INSERT INTO `article_content` VALUES ('5', '5', '<h3>1.《海蒂和爷爷》</h3><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170407/58e764a86dc94.jpg\"><br></p><blockquote><p>看完你会觉得此生不去阿尔卑斯山是一大憾事，而且还有两大萝莉</p></blockquote><h3>2.《生命》</h3><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170407/58e7676a35202.jpg\" class=\"\"><br></p><blockquote><p>BBC出品的生命纪录片，什么？你说你不是来看风景的？那你走吧</p></blockquote><h3>3.《小森林》</h3><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170407/58e768a18f666.jpg\"><br></p><blockquote><p>其实我就是来看没纸和美食的，你敢说你不是？</p></blockquote><p>4.《美丽中国》</p><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170407/58e769946313a.jpg\"><br></p><blockquote><p>祖国大地，很想去走走</p></blockquote><p>5.《天地玄黄》</p><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170407/58e769f7eaba8.jpg\"><br></p><blockquote><p>这个瀑布真的，世界奇观吧</p></blockquote><p><br></p>', 's:0:\"\";');
INSERT INTO `article_content` VALUES ('10', '10', '<p></p><ul><li>中国不缺脑残粉，但也不缺看作品质量的观众。<br></li><li>望各位片酬与自身演技严重不成正比的明星不要妄称自己是演员，会被人鄙夷的。<br></li></ul><p></p><blockquote><p><font color=\"#008080\">特别是被达康书记鄙夷</font></p></blockquote><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170412/58eda037bfea4.jpg\"><br></p><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170412/58eda05132980.jpg\"><br></p><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170412/58eda05dc94a5.gif\"><br></p><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170412/58eda0671eeda.jpg\"><br></p><h3><font color=\"#000080\">自重！</font></h3><p><br></p>', 's:0:\"\";');
INSERT INTO `article_content` VALUES ('11', '11', '<h3>一<br></h3><p>我们都知道laravel框架是默认开启post请求的防Csrf攻击的，在进行post请求时需要进行token验证，可是微信服务端的post请求我们没办法加入自己的token，所以必须关闭框架的Csrf验证，这里有两种方式：</p><p></p><h4><ul><li>全局关闭防Csrf攻击的token验证</li></ul></h4><p></p><blockquote><p>在<font color=\"#0000ff\">app/Http/kernel.php</font>文件里注释掉下面这行即可全局关闭Csrf攻击的token验证</p></blockquote><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"php hljs\" codemark=\"1\"><span class=\"hljs-comment\">//\\App\\Http\\Middleware\\VerifyCsrfToken::class,</span></code></pre><p><br></p><p></p><h4><ul><li>局部关闭防Csrf攻击的token验证</li></ul></h4><p></p><blockquote><p>在<font color=\"#0000ff\">app/Http/Middleware/VerifyCsrfToken.php</font>文件里$except数组里填写要排除的url，比如关闭home路由下的token验证</p></blockquote><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"php hljs\" codemark=\"1\"><span class=\"hljs-keyword\">protected</span> $except = [\r\n        <span class=\"hljs-string\">\'home\'</span>\r\n    ];</code></pre><h3>二</h3><p>以前很多微信开发在我们的服务端获取微信服务器post传过来的xml数据时，一般都用<font color=\"#ff0000\">$HTTP_RAW_POST_DATA</font>全局变量来获取post的原生数据，要使用这个全局变量要在配置文件php.ini中把<em><a href=\"http://www.php.net/manual/en/ini.core.php#ini.always-populate-raw-post-data\">always_populate_raw_post_data</a></em>设置成<font color=\"#ff0000\">on</font><font color=\"#000000\">这在php5.6以前这都是没问题的，但新版本的php中官方已经废止了这个选项。现在都php7时代了，所以啊，还得与时俱进呐。官方建议使用</font><font color=\"#ff0000\">php://input</font><font color=\"#000000\">代替</font><font color=\"#ff0000\">$HTTP_RAW_POST_DATA。</font><font color=\"#000000\"><br></font></p><blockquote><p>解决方法使用php://input来获取原生数据</p></blockquote><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"php hljs\" codemark=\"1\">$message = file_get_contents(<span class=\"hljs-string\">\"php://input\"</span>)</code></pre><p>上面这行代码就可以把post原生数据放入$message变量中了</p><h3>三</h3><p></p><h4><ul><li>JS-SDK开发中的注意事项</li></ul><blockquote><p>生成签名时所填写的url不要用框架url函数去生成，在微信端的url会自动加入微信那边的参数，会导致签名与微信端生成的签名不一致</p></blockquote></h4><p></p><p>在生成签名时获取url地址还是通过原生的超全局变量$_SERVER去获取</p><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"php hljs\" codemark=\"1\">$protocol = (!<span class=\"hljs-keyword\">empty</span>($_SERVER[<span class=\"hljs-string\">\'HTTPS\'</span>]) &&amp; $_SERVER[<span class=\"hljs-string\">\'HTTPS\'</span>] !== <span class=\"hljs-string\">\'off\'</span> || $_SERVER[<span class=\"hljs-string\">\'SERVER_PORT\'</span>] == <span class=\"hljs-number\">443</span>) ? <span class=\"hljs-string\">\"https://\"</span> : <span class=\"hljs-string\">\"http://\"</span>;\r\n$url = <span class=\"hljs-string\">\"$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]\"</span>;</code></pre><blockquote><p>在填写js接口安全域名时，不要带上http://活着www直接写域名就行</p></blockquote><blockquote><p>JS-SDK里的域名必须备案，不然，你就试试吧</p></blockquote><p>暂时写这么多，等我遇到坑的时候在填补上去。</p><p><br></p>', 's:0:\"\";');
INSERT INTO `article_content` VALUES ('12', '12', '<blockquote><p>如果我们在laravel命令行模式下使用artisan出现如下错误</p></blockquote><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">Catchable fatal error: Argument 2 passed to Illuminate\\Routing\\UrlGenerator::__construct() must be an instance of Illuminate\\Http\\Request,\r\nnull given, called <span class=\"hljs-keyword\">in</span> F:\\WWW\\weixin\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RoutingServiceProvider.php on line 62 and defined <span class=\"hljs-keyword\">in</span> F:\r\n\\WWW\\weixin\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\UrlGenerator.php on line 102\r\n</code></pre><blockquote><p>原因是因为你在配置文件中使用了路由函数比如url()，只要去你的配置文件config文件夹下面的文件把这些函数去掉就可以了</p></blockquote><p><br></p>', 's:0:\"\";');
INSERT INTO `article_content` VALUES ('13', '13', '<p></p><h3><ul><li><a href=\"https://movie.douban.com/subject/3077668/\" target=\"_blank\">《天水围的日与夜》</a><br></li></ul></h3><p></p><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170422/58faf61d892c0.jpg\"><br></p><blockquote><p>这是一部你连剧照都挑不出特别突出的电影，如果你看懂了，外表的平静掩盖不了你内心的共鸣。</p></blockquote><p></p><h3><ul><li><a href=\"https://movie.douban.com/subject/26694988/\" target=\"_blank\">《比海更深》</a></li></ul></h3><p></p><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170422/58faf8f51338d.jpg\"><br></p><blockquote><p>是枝裕和导演的新作，他的《如父如子》也很好，我一直觉得日本的家庭片要比韩国的出色，日本拍的家庭片都很细腻，这好似我很喜欢的</p></blockquote><p></p><h3><ul><li><a href=\"https://movie.douban.com/subject/1291818/\" target=\"_blank\">《饮食男女》</a></li></ul></h3><p></p><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170422/58fafb54291cf.jpg\"><br></p><blockquote><p>一桌子一家庭，这是中国从古到今都不曾改变的。而不论桌子上的饭菜是多是少，是好是坏，你坐在这里都是我们心里对这个家的认同</p></blockquote><p></p><h3><ul><li><a href=\"https://movie.douban.com/subject/10537853/\" target=\"_blank\">《万箭穿心》</a></li></ul></h3><p></p><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170422/58fafd8fb7810.jpg\"><br></p><blockquote><p>女主演技吊打各大花瓶，初次看的时候被颜丙燕的演技惊艳到了，谁看谁知道</p></blockquote><p></p><h3><ul><li><a href=\"https://movie.douban.com/subject/1292365/\" target=\"_blank\">《活着》</a></li></ul></h3><p></p><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170422/58fb008ba4b5e.jpg\"><br></p><blockquote><p>这部不用介绍了，还没看的，连我都会嫌弃你</p></blockquote><p><b>以上。</b></p><p><br></p>', 's:0:\"\";');
INSERT INTO `article_content` VALUES ('14', '14', '<h3><ul><li>先上照片<br></li></ul></h3><p><img src=\"https://www.jorkboy.xyz/Public/Upload/20170423/58fc71140f7cb.jpg\"><br></p><p></p><ul><li>身高：160cm</li><li>体重：48.5Kg</li><li>其他情况慢慢再了解。</li></ul><h3><ul><li>对男士的要求</li></ul></h3><p></p><p></p><ol><li>广东<font color=\"#ff0000\">汕尾</font>人</li><li>身高：<font color=\"#ff0000\">175</font>cm以上</li><li><font color=\"#ff0000\">不</font>抽烟，<font color=\"#ff0000\">不</font>酗酒，<font color=\"#ff0000\">不</font>花心</li><li>年龄：<font color=\"#ff0000\">24-28</font>岁</li><li>有意者请先发自己的照片</li></ol><p></p><blockquote><p>联系方式：allstill@live.com</p><p>请发送个人基本资料到邮箱，包括姓名，身高，体重，以及个人照一张！</p></blockquote><p><br></p>', 's:0:\"\";');
INSERT INTO `article_content` VALUES ('15', '15', '<h4><ul><li>设置语言</li></ul></h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">LANG=en_US.UTF-8</code></pre><h4><ul><li>在家目录里编辑 &nbsp;.bash_profile文件，加入下面文字</li></ul><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\"><span class=\"hljs-built_in\">export</span> LANG=en_US.UTF-8</code></pre><ul><li>保存退出 &nbsp;:wq</li></ul></h4><pre style=\"max-width:100%;overflow-x:auto;\"><code class=\"bash hljs\" codemark=\"1\">:wq</code></pre><blockquote><p>这种方法是修改自己帐号的语言编码，其他账号想修改也要做相应处理</p></blockquote><p><br></p>', 's:0:\"\";');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `name` varchar(16) CHARACTER SET utf8mb4 NOT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '0', '电影');
INSERT INTO `category` VALUES ('2', '0', 'PHP');
INSERT INTO `category` VALUES ('3', '0', 'javascript');
INSERT INTO `category` VALUES ('4', '0', 'Mysql');
INSERT INTO `category` VALUES ('5', '0', '服务器');
INSERT INTO `category` VALUES ('6', '0', 'Linux');
INSERT INTO `category` VALUES ('7', '0', '随记');
INSERT INTO `category` VALUES ('8', '0', 'Moments');
INSERT INTO `category` VALUES ('9', '2', 'laravel');