
/****** ��ϸ͸�����Git��SVN�����𣨼���ʽVS�ֲ�ʽ��******/
http://blog.csdn.net/hellow__world/article/details/72529022

/*********************** ��װ�����òֿ� *****************************/
1.��װ�����ñ���ȫ���û���������
$ git config --global user.name "Your Name"
$ git config --global user.email "email@example.com"

2.cd ��������ļ���֮�󴴽��ֿ�
$ mkdir learngit
$ cd learngit
$ pwd

3.�����Ŀ¼���Git�ɹ���ֿ⣨ls -ah ����ɿ������ص�.git�ļ���
$ git init

/*********************** �����ļ� ****************************/

4.�����Ŀ¼������ļ���readme.txtֻ��һ�����ӣ���������ļ������洴��һ��readme.txt�ļ���git�ǲ�����㴴����
$ git add readme.txt

����4�Ľ��ͣ�git add �����һ����Ӷ���ļ�

5.������git commit����Git�����ļ��ύ���ֿ�
$ git commit -m "wrote a readme file"

����5�Ľ��ͣ�git commit ���-m����������Ǳ����ύ��˵�������������������ݣ���Ȼ�����������ģ���������ܴ���ʷ��¼�﷽����ҵ��Ķ���¼��

4��5��������ļ����

/************************** ʱ��� ***********************************/
6.�鿴���
$ git status��״̬�����չ��������״̬��
$ git diff readme.txt ���ǲ����ϴ���ô�޸ĵ�readme.txt���鿴�޸����ݣ�

7.���ύ
$ git add readme.txt

8.�鿴�ύ�İ汾(̫�ҿɼ���--pretty=oneline����)
$ git log

9.���˰汾����һ���汾����HEAD^������һ���汾����HEAD^^����Ȼ����100���汾д100��^�Ƚ�������������������д��HEAD~100��
$ git reset --hard HEAD^

10.�鿴��Ϣ
$ cat readme.txt

11.��¼ÿ���޸ĵļ�¼
$ git reflog