
/****** 详细透彻解读Git与SVN的区别（集中式VS分布式）******/
http://blog.csdn.net/hellow__world/article/details/72529022

/*********************** 安装及设置仓库 *****************************/
1.安装后配置本地全局用户名和邮箱
$ git config --global user.name "Your Name"
$ git config --global user.email "email@example.com"

2.cd 命令进入文件夹之后创建仓库
$ mkdir learngit
$ cd learngit
$ pwd

3.把这个目录变成Git可管理仓库（ls -ah 命令可看见隐藏的.git文件）
$ git init

/*********************** 创建文件 ****************************/

4.在这个目录下添加文件（readme.txt只是一个例子）现在这个文件夹下面创建一个readme.txt文件，git是不会帮你创建的
$ git add readme.txt

关于4的解释：git add 命令可一次添加多个文件

5.用命令git commit告诉Git，把文件提交到仓库
$ git commit -m "wrote a readme file"

关于5的解释：git commit 命令，-m后面输入的是本次提交的说明，可以输入任意内容，当然最好是有意义的，这样你就能从历史记录里方便地找到改动记录。

4，5两步完成文件添加

/************************** 时光机 ***********************************/
6.查看结果
$ git status（状态，掌握工作区间的状态）
$ git diff readme.txt （记不清上次怎么修改的readme.txt，查看修改内容）

7.再提交
$ git add readme.txt

8.查看提交的版本(太乱可加上--pretty=oneline参数)
$ git log

9.回退版本（上一个版本就是HEAD^，上上一个版本就是HEAD^^，当然往上100个版本写100个^比较容易数不过来，所以写成HEAD~100）
$ git reset --hard HEAD^

10.查看信息
$ cat readme.txt

11.记录每次修改的记录
$ git reflog