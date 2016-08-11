-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016-03-01 08:33:59
-- 服务器版本: 5.6.27
-- PHP 版本: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `CI`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `author` varchar(8) NOT NULL,
  `content` text NOT NULL,
  `createtime` int(11) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1' COMMENT '0是栏目文章，1是普通文章，2是视频',
  `rank` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `nid`, `title`, `author`, `content`, `createtime`, `video_url`, `thumb`, `type`, `rank`) VALUES
(20, 42, '课程概括', '', '', 0, '', '', 0, 0),
(23, 45, '课程简介', '', '<p>课程简介</p><p style="line-height: 16px;"><img style="vertical-align: middle; margin-right: 2px;" src="http://localhost/public/plug/uedit/dialogs/attachment/fileTypeImages/icon_rar.gif"/><a style="font-size:12px; color:#0066cc;" href="/public/plug/uedit/php/upload/file/20151217/1450332671992631.zip" title="归档.zip">归档.zip</a></p><p><br/></p>', 0, '', '', 0, 0),
(25, 47, '课程特色', '', '<p style="font-family: STHeiti; font-size: medium; white-space: normal; text-align: center;"><strong><span style="font-family: 仿宋_gb2312; font-size: 21px;"><br/></span></strong></p><p style="font-family: STHeiti; font-size: medium; white-space: normal; text-align: center;"><strong><span style="font-family: 仿宋_gb2312; font-size: 21px;">课程特色</span></strong></p><p style="font-family: STHeiti; font-size: medium; white-space: normal; text-indent: 40px;"><strong><span style="font-family: 仿宋_gb2312; font-size: 20px;">课程发展定位：</span></strong></p><p style="font-family: STHeiti; font-size: medium; white-space: normal; text-indent: 40px;"><strong><span style="font-family: 仿宋_gb2312; font-size: 20px;"><br/></span></strong></p><p style="font-family: STHeiti; font-size: medium; white-space: normal; text-indent: 32px;"><span style="font-family: 仿宋_gb2312;">通信原理课程的建设目标必须遵循我校的办学特色、办学理念、办学措施及培养目标。因此，通信原理要</span><span style="font-family: 仿宋_gb2312;">坚持我校的“面向信息社会发展适应电子信息时代需求、面向通信与电子信息学科发展前沿适应电子信息与通信科学研究需求，面向军事信息通信技术满足国防安全技术提升需求”的“三个”办学特色；必须秉承我校的“一流大学需有一流的本科生教育、一流的教师要进入本科生课堂、一流的科研成果需为本科教学服务、一流的仪器必服务本科教学、一流的学生必尽早接触学科前沿”“五个一流”的办学理念；采取“本科教学与学科建设相结合、学校教学与社会企业教育相结合、厚实的基础理论与宽广的专业实践相结合”的办学措施；注重学生“主动获取知识的能力、分析解决问题的能力、初步的创新能力和基本的组织管理能力”的四个能力的培养；引导学生学会学习知识，学会应用知识和学会创造知识，培养学生的社会责任感、国际意识和创新精神，促使学生尽早适应时代，服务社会，创造未来。</span></p><p style="font-family: STHeiti; font-size: medium; white-space: normal; text-indent: 32px;"><span style="font-family: 仿宋_gb2312;"><br/></span></p><p style="font-family: STHeiti; font-size: medium; white-space: normal; text-indent: 37px;"><strong><span style="font-family: 仿宋_gb2312; font-size: 19px;">课程建设目标：</span></strong><strong><span style="font-size: 19px;"></span></strong></p><p style="font-family: STHeiti; font-size: medium; white-space: normal; text-indent: 37px;"><strong><span style="font-family: 仿宋_gb2312; font-size: 19px;"><br/></span></strong></p><p style="font-family: STHeiti; font-size: medium; white-space: normal; text-indent: 32px;"><span style="font-family: 仿宋_gb2312;">经过十二五建设，要将通信原理课程建设成为教学理念先进、教学内容厚重；实验体系完善、</span><span style="font-family: 仿宋_gb2312;">实验方法全面、实验手段丰富；师资梯队合理、教学资源丰富、设备条件一流、管理科学合理的一流课程。</span></p><p style="font-family: STHeiti; font-size: medium; white-space: normal; text-indent: 32px;"><span style="font-family: 仿宋_gb2312;"><br/></span></p><p style="font-family: STHeiti; font-size: medium; white-space: normal; line-height: 18px; text-indent: 37px;"><strong><span style="font-family: 仿宋_gb2312; font-size: 19px;">课程建设思路：</span></strong><strong><span style="font-size: 19px;"></span></strong></p><p style="font-family: STHeiti; font-size: medium; white-space: normal; line-height: 18px; text-indent: 37px;"><strong><span style="font-family: 仿宋_gb2312; font-size: 19px;"><br/></span></strong></p><p style="font-family: STHeiti; font-size: medium; white-space: normal; line-height: 18px; text-indent: 40px;"><span style="font-family: 仿宋_gb2312;">通信原理的属性是专业基础</span><span style="font-family: 仿宋_gb2312;">。可见，通信原理课程的建设思路是使得课程<strong>&nbsp;“根实干壮叶繁茂”</strong>，<strong>根实</strong>指夯实专业基础</span><span style="font-family: 仿宋_gb2312;">；<strong>干壮</strong>指的是使得面向“通信工程专业”、“信息工程专业”、“信息安全专业”、“空间信息专业”等专业方向的专业基础类课程；既涵盖传统通信理论，又反映通信新技术的创新理念；既使实验内容丰富，又使得实验独具特色；<strong>叶繁茂</strong>包涵了两个方面。一是完善教学资源库建设，使得课程的资源能被全国一本、二本、三本、大专及继续教育各层次的学习对象所共享，二是不断充实和更教材、实验系列，特别是引导学生借助大企业资助的实训设施，搭建综合性实验、设计性实验及创新性实验。</span><span style="font-family: 仿宋_gb2312;"></span></p><p style="font-family: STHeiti; font-size: medium; white-space: normal; line-height: 18px; text-indent: 32px;"><span style="font-family: 仿宋_gb2312;">通信原理课程的建设思路必须沿着以下五条途径寻经。①要在专业基础课程中配合国家服务急需的科研协同创新意识的培养；②要进行课程体制机制改革的管理协同创新；③要探索人才培养模式的教育协同创新；④要做好支撑课程内容优化的保障协同创新；⑤要以创新来推动课程建设各项工作的发展；⑥要发奋努力，将通信原理建设成名符其实的国家级精品课程。</span></p><p style="font-family: STHeiti; font-size: medium; white-space: normal;"><span style="font-family: 仿宋_gb2312;">遵循学校为课程体系制定的“<strong>适应、开放、多元、共享、协同、联合</strong>”十二字指导思想。逐一落实这十二字指导思想。</span></p><p><br/></p>', 0, '', '', 0, 0),
(26, 48, '课程教学', '', '', 0, '', '', 0, 0),
(27, 49, '教学团队', '', '', 0, '', '', 0, 0),
(28, 50, '教学大纲', '', '<p style="font-family: STHeiti;font-size: medium;white-space: normal;text-align: center;margin-left: 2px"><strong><span style="font-family: 黑体;font-size: 21px">《通信原理》教学大纲</span></strong></p><p style="font-family: STHeiti;font-size: medium;white-space: normal"><br/></p><p style="font-family: STHeiti;font-size: medium;white-space: normal"><strong><span style="font-family: 楷体_gb2312">&nbsp; 课程编号：</span></strong><span style="font-family: 楷体_gb2312">&nbsp;0121017</span></p><p style="font-family: STHeiti;font-size: medium;white-space: normal"><br/></p><p style="font-family: STHeiti;font-size: medium;white-space: normal"><strong><span style="font-family: 楷体_gb2312">&nbsp; 课程名称：</span></strong><span style="font-family: 楷体_gb2312">通信原理 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>英文名称</strong>： &nbsp;Communication Theory</span></p><p style="font-family: STHeiti;font-size: medium;white-space: normal"><strong><span style="font-family: 楷体_gb2312">&nbsp; 学时：</span></strong><span style="font-family: 楷体_gb2312">60+30 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>学分：</strong>4</span></p><p style="font-family: STHeiti;font-size: medium;white-space: normal"><strong><span style="font-family: 楷体_gb2312">&nbsp; 课程类型：</span></strong><span style="font-family: 楷体_gb2312">必修 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>课程性质：</strong>学科基础课</span></p><p style="font-family: STHeiti;font-size: medium;white-space: normal"><strong><span style="font-family: 楷体_gb2312">&nbsp; 适用专业</span><span style="font-family: 楷体_gb2312">：</span></strong><span style="font-family: 楷体_gb2312">通信与信息系统 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>先修课程：</strong>随机过程、信号系统、电子线路</span></p><p style="font-family: STHeiti;font-size: medium;white-space: normal"><strong><span style="font-family: 楷体_gb2312">&nbsp; 开课学期：</span></strong><span style="font-family: 楷体_gb2312">7 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>开课院系：</strong>通信工程学院通信系</span></p><p style="font-family: STHeiti;font-size: medium;white-space: normal"><br/></p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 36px"><span style="font-family: 黑体;font-size: 18px">一、课程的教学目标与任务</span></p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">&nbsp;本课程是通信与信息系统专业的一门必修主课，既是通信专业的基础理论课，又是一门专业性的课程。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">教学目标是使学生掌握现代通信，尤其是数字通信的基本概念、基本理论以及基本的分析方法；熟悉</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">通信系统的组成和工作原理；了解通信系统主要组成部分的实现方法。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">教学任务是使学生打下良好的通信理论基础，培养对通信系统分析与设计的能力。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px"><br/></p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 36px"><span style="font-family: 黑体;font-size: 18px">二、本课程与其它课程的联系和分工</span></p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">&nbsp;本课程主要是研究通信系统信息传输与处理理论与技术，不涉及具体的电路，但这些理论与技术是建立在</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">信号分析理论、电子线路等课程的基础上。需要先修信号与系统、随机信号处理、电子线路、微机原理等基</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">础课程。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px"></p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 36px"><span style="font-family: 黑体;font-size: 18px">三、课程内容及基本要求</span></p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px"></p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px"><strong>(</strong><strong>一)&nbsp;</strong><strong>绪论</strong><strong>(3</strong><strong>学时)</strong></p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">1.基本要求</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 38px">(1）掌握通信系统的基本问题与主要性能指标；模拟通信与数字通信；信息量、平均信息量、信息速率。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">(2) 熟悉通信系统的分类；通信方式。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">（3）了解通信的概念与发展；</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px"><strong>（二）</strong><strong>统计通信理论基础</strong><strong>(4</strong><strong>学时)</strong></p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">1.基本要求</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 38px">(1）掌握平稳随机过程的二阶矩分析；高斯过程与窄带高斯过程；</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">(2) 熟悉平稳随机过程的各态历经性；正弦波加窄带高斯过程；随机过程通过线性系统。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">（3）了解随机信号与随机过程；n维联合概率密度函数；随机过程的模型。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">2. 说明</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">&nbsp;本章主要巩固复习随机信号分析课程中所学的内容，通过计算机仿真实验进一步掌握在通信原理理论中所</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">用到随机信号和分析方法。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 28px"><strong>（三）信道与噪声(6学时)</strong></p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（1）掌握调制信道模型；编码信道模型；恒参信道对信号传输的影响；加性高斯白噪声；Shannon信道</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp;容量公式。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（2）熟悉信道的定义与模型；恒参信道实例；随参信道实例；随参信道对信号传输的影响；起伏噪声；</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp;噪声等效带宽；连续信道的信道容量“三要素”。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 28px">（3）了解随参信道特性的改善。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp;<strong>（四）</strong><strong>模拟调制系统(4学时)</strong></p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（1）掌握AM、DSB、SSB信号调制与解调；AM、DSB、SSB信号抗噪声性能。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（2）熟悉VSB、FM、PM信号的调制原理；频分复用的概念。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 28px">（3）了解FM信号的解调原理；复合调制及多级调制的概念。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">2.重点、难点</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">重点：AM、DSB、SSB原理与抗噪性能</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">难点：FM抗噪性能分析</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp;<strong>（五）数字基带传输系统(10学时)</strong></p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（1）掌握数字基带信号；AMI码、HDB3码、PST码、双相码的编码原理和主要优缺点；无码间干扰的基带传</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">输特性；无码间干扰时的基带系统抗噪声性能。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（2）熟悉数字基带信号与频谱特性；基带脉冲传输与码间干扰；眼图；时域均衡。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 28px">（3）了解Miller码、CMI码、nBmB码、4B/3T码；部分响应系统。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">2.重点、难点</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">重点：传输码型、基带信号功率谱密度、奈奎斯特第一准则、基带系统抗噪性能和时域均衡原理。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">难点：码间干扰有无的判定、时域均衡</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">3. 说明</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">本章安排2个学时进行基带系统计算机仿真，帮助学生深入了解基带信号功率谱密度、奈奎斯特第一准则、</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">基带系统抗噪性能等理论。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp;&nbsp;<strong>（六）模拟信号的数字传输(10学时)</strong></p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（1）掌握抽样定理；脉冲振幅调制(PAM)原理；脉冲编码调制(PCM)原理；增量调制(ΔM)原理；</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（2）熟悉均匀量化；非均匀量化；脉冲编码调制(PCM)系统抗噪声性能；增量调制(ΔM)系统抗噪声性能；</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp;时分复用和多路数字电话系统原理。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 28px">（3）了解十五折线非均匀量化；增量脉冲编码调制(DPCM)原理。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">2.重点、难点</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">重点：抽样定理、量化、PCM编译码原理与抗噪性能、增量调制(ΔM)系统原理。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">难点：带通抽样定理、非线性量化、13折线A律PCM编码、DPCM原理。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">3. 说明</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">本章安排2个学时进行模拟信号数字化的计算机仿真，帮助学生深入了解PCM编译码原理、增量调制(ΔM)系</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">统原理。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 28px"><strong>（七）数字调制系统(10学时)</strong></p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（1）掌握二进制数字调制解调原理；二进制ASK，FSK，PSK、DPSK系统的抗噪声性能；二进制数字调制系</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">统的性能比较。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（2）熟悉数字调制信号的频谱特性；4PSK、4DPSK、MSK信号调制解调原理。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 28px">（3）了解多进制数字调制的概念；QAM、GMSK调制方式。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">2.重点、难点</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 38px">重点：二进制数字调制解调原理与抗噪性能。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 28px">难点：多进制数字调制解调原理与抗噪性能。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">3. 说明</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 31px">本章安排2个学时进行数字调制系统的计算机仿真，帮助学生深入了解频带传输原理。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 28px"><strong>（八）数字信号的最佳接收(8学时)</strong></p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（1）掌握数字信号接收的统计表述；最佳接收准则；二进制确知信号的最佳接收原理及抗噪声性能；二进</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp;制确知信号的最佳形式；匹配滤波器原理。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; （2）熟悉二进制随相信号的最佳接收原理及抗噪声性能；实际接收机与最佳接收机的性能比较；匹配滤波</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp;器的实现；匹配滤波器在最佳接收中的应用。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 28px">（3）了解多进制确知信号的最佳接收原理；基带系统的最佳化。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">2.重点、难点</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 38px">重点：二进制确知信号的最佳接收原理及抗噪声性能；二进制确知信号的最佳形式；匹配滤波器原理。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 28px">难点：随参信号的最佳接收原理及抗噪声性能、最佳基带传输系统。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal"><strong>&nbsp; &nbsp;</strong><strong>（九） 同步原理(6学时)</strong></p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（1）掌握载波同步原理；位同步原理；群同步原理。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（2）熟悉载波相位误差对解调性能的影响；位同步系统的性能及其相位误差对解调性能的影响；巴克码；</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; 群同步系统的性能。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal">&nbsp; &nbsp;（3）了解载波同步系统的性能；群同步的保护；扩展频谱系统同步。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px;text-indent: 31px">2.重点、难点</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 38px">重点：载波同步、位同步、群同步原理与性能。</p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 36px"><br/></p><p style="font-family: STHeiti;font-size: medium;white-space: normal;text-indent: 36px"><span style="font-family: 黑体;font-size: 18px">四、本课程与其它课程的关系</span></p><p style="font-family: STHeiti;font-size: medium;white-space: normal;line-height: 24px">&nbsp; &nbsp;应先修如下课程：信号分析；电子线路；数字电路；概率论；线性代数等。</p><p><br/></p>', 0, '', '', 0, 0),
(29, 51, '试验实践', '', '', 0, '', '', 0, 0),
(30, 52, '教学成果', '', '', 0, '', '', 0, 0),
(31, 53, '课程资源', '', '', 0, '', '', 0, 0),
(32, 54, '合作交流', '', '', 0, '', '', 0, 0),
(33, 55, '联系我们', '', '<p><iframe class="ueditor_baidumap" src="http://localhost/public/plug/uedit/dialogs/map/show.html#center=110.36392,25.301957&zoom=15&width=530&height=340&markers=110.36392,25.301957&markerStyles=l,A" frameborder="0" width="534" height="344"></iframe></p>', 0, '', '', 0, 0),
(34, 56, '课程教材', '', '', 0, '', '', 0, 0),
(36, 58, '难点解读', '', '', 0, '', '', 0, 0),
(37, 59, '教学视频', '', '', 0, '', '', 0, 0),
(38, 60, '电子教室', '', '', 0, '', '', 0, 0),
(39, 61, '文献资料', '', '', 0, '', '', 0, 0),
(40, 62, '教学成果', '', '', 0, '', '', 0, 0),
(41, 63, '教改成果', '', '', 0, '', '', 0, 0),
(42, 64, '荣誉奖励', '', '<p>啊啊</p>', 0, '', '', 0, 0),
(43, 65, '实验室简介', '', '', 0, '', '', 0, 0),
(44, 66, '实践设备', '', '', 0, '', '', 0, 0),
(45, 67, '配套实验', '', '', 0, '', '', 0, 0),
(46, 68, '常用软件', '', '', 0, '', '', 0, 0),
(50, 69, '课程规划', '', '<p>啊啊说的啊</p>', 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ci_session`
--

CREATE TABLE IF NOT EXISTS `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ci_session`
--

INSERT INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('01c405491a170346a82a4e1f001401f8eaec7559', '::1', 1456821202, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363832313230323b),
('163c917dd0e041c4d4114fab92913432dcbbeb76', '172.29.205.5', 1450966241, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435303936363234313b),
('4ff8c7fdd5e68cbcd675e579b99fe75c77fc3f06', '::1', 1450595864, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435303539353537373b),
('54abb177b5613982e1015ef7d259424177480108', '::1', 1450692513, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435303639323531333b),
('64e9d80b1769ed667212a184be715dd8d5713b4f', '127.0.0.1', 1450621773, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435303632313635313b),
('655bba6c8e6b768103b545042539f1ee24426257', '::1', 1450595485, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435303539353235353b),
('727ceb89e6f2251b1c8271d59c0bdc22d69d2847', '::1', 1450595936, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435303539353838353b),
('99fc6d52bab3a7593ba21fbf9ec09c33c8c6ef63', '::1', 1450594463, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435303539343335373b),
('9fd8a03b76e60b1a1f69ac18ebc3e18a18698f86', '127.0.0.1', 1450663052, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435303636333035323b),
('cca0c5f5fcc5c8e8d2220eedfd865c9668cf0cf5', '::1', 1456820900, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435363832303930303b),
('d36f6cad0ce60afc3af98cdea5ff8444ab1785a3', '::1', 1450594936, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435303539343733333b),
('d83f9900aa478feb72c8b70af697136caf938577', '10.11.161.238', 1451044265, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435313034343236353b);

-- --------------------------------------------------------

--
-- 表的结构 `ext_teach_photo`
--

CREATE TABLE IF NOT EXISTS `ext_teach_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `flink`
--

CREATE TABLE IF NOT EXISTS `flink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `url` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `flink`
--

INSERT INTO `flink` (`id`, `name`, `url`) VALUES
(5, '桂林电子科技大学', 'http://www.guet.edu.cn/');

-- --------------------------------------------------------

--
-- 表的结构 `nav`
--

CREATE TABLE IF NOT EXISTS `nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL DEFAULT '0' COMMENT '0是1级，1是2级子目录',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父导航id号',
  `navname` varchar(20) NOT NULL,
  `rank` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `nav`
--

INSERT INTO `nav` (`id`, `sid`, `pid`, `navname`, `rank`) VALUES
(42, 0, 0, '课程概括', 0),
(45, 1, 42, '课程简介', 0),
(47, 1, 42, '课程特色', 0),
(48, 0, 0, '课程教学', 0),
(49, 1, 48, '教学团队', 0),
(50, 1, 48, '教学大纲', 0),
(51, 0, 0, '试验实践', 0),
(52, 0, 0, '教学成果', 0),
(53, 0, 0, '课程资源', 0),
(54, 0, 0, '合作交流', 0),
(55, 0, 0, '联系我们', 0),
(56, 1, 53, '课程教材', 0),
(58, 1, 48, '难点解读', 0),
(59, 1, 53, '教学视频', 0),
(60, 1, 53, '电子教室', 0),
(61, 1, 53, '文献资料', 0),
(62, 1, 52, '教学成果', 0),
(63, 1, 52, '教改成果', 0),
(64, 1, 52, '荣誉奖励', 0),
(65, 1, 51, '实验室简介', 0),
(66, 1, 51, '实践设备', 0),
(67, 1, 51, '配套实验', 0),
(68, 1, 51, '常用软件', 0),
(69, 1, 42, '课程规划', 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
