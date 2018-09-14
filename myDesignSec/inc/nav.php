<?php 
    /*
        根据url给与导航栏选中效果
    */
    function finUrl($url){
        return stristr($_SERVER["REQUEST_URI"] , $url);
    }

 ?>
<!-- 导航-->
        <div class="col-sm-3 col-md-2 sidebar">

            <ul class="nav nav-sidebar">
                <li class="first-li"><i class="glyphicon glyphicon-list"></i>&nbsp;&nbsp;菜单</li>
                <li><a href="index.php"  class="<?php echo finUrl("index.php") != '' ? 'active' : '' ?>"><i class="glyphicon glyphicon-th-large"></i>&nbsp;&nbsp;新闻模块管理<i class="glyphicon glyphicon-menu-right"></i></a></li>

                <li><a  href="newsDetail.php" class="<?php echo finUrl("newsDetail") != '' ? 'active' : '' ?>"><i class="fa fa-newspaper-o"></i>&nbsp;&nbsp;新闻详情管理<i class="glyphicon glyphicon-menu-right"></i></a></li>

                <li><a href="community.php" class="<?php echo finUrl("community.php") != '' ? 'active' : '' ?>"><i class="glyphicon glyphicon-th-list"></i>&nbsp;&nbsp;社区模块管理<i class="glyphicon glyphicon-menu-right"></i></a></li>

                <li><a  href="note.php" class="<?php echo finUrl("note.php") != '' || finUrl("notesDetail.php") != '' ? 'active' : '' ?>"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;社区帖子管理<i class="glyphicon glyphicon-menu-right"></i></a></li>

                <li><a  href="charts.php" class="<?php echo finUrl("charts.php") != '' ? 'active' : '' ?>"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;数据统计分析<i class="glyphicon glyphicon-menu-right"></i></a></li>

                <li><a  href="user.php" class="<?php echo finUrl("user.php") != '' ? 'active' : '' ?>"><i class="fa fa-user-circle-o"></i>&nbsp;&nbsp;账号信息维护<i class="glyphicon glyphicon-menu-right"></i></a></li>
            </ul>
        </div>