#########################################################################
#																		#
#						广告操作										#
#																		#
#########################################################################

#
#	1、查询所有广告
#
select Id , Image , Link , Priority from adverts order by priority desc;




#########################################################################
#																		#
#						栏目操作										#
#																		#
#########################################################################



#
#	1、查询所有栏目
#
select id , name , priority from sections order by Priority desc;


#########################################################################
#																		#
#						作者操作										#
#																		#
#########################################################################

#
#	1、查询所有作者
#
select Id,Name,Pinyin,Header,Introduce from Authors;



#########################################################################
#																		#
#						图书类别操作									#
#																		#
#########################################################################

#
#	1、查询所有类别
#
select Id ,Name ,Icon , Tag from Categories;



#########################################################################
#																		#
#						出版社操作										#
#																		#
#########################################################################

#
#	1、查询所有类别
#
select Id,Name from Publishers;



#########################################################################
#																		#
#						图书操作										#
#																		#
#########################################################################

#
#	1、获取特定栏目的图书信息
#
select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name,b.publisherId, p.name , b.authorId , a.name  , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) 
from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId inner join bookinsections bs on b.Id = bs.BookId
where bs.SectionId = 栏目ID

#
#	2、获取所有图书信息
#
select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name,b.publisherId, p.name , b.authorId , a.name  , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) 
from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId


#
#	3、获取图书详情(books)
#
select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name,b.publisherId, p.name , b.authorId , a.name  , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) 
from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId
where b.Id = 图书ID




#
#	4、获取特定图书列表详情(bookDetails)
#
select b.id , b.number , b.state ,b.libraryId , l.name , b.bookId 
from bookDetails b inner join libraries l on l.id=b.libraryId where b.bookId=图书ID



#
#	5、获取特定读者借书架内的图书信息
#
select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name,b.publisherId, p.name , b.authorId , a.name  , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) 
from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId inner join bookshelves bs on bs.BookId = b.Id 
where memberId = 读者编号



#########################################################################
#																		#
#						读者操作										#
#																		#
#########################################################################



#
#	1、读者登录
#
select id,name,Phone,CardId,Address,State , Header from members where phone=@phone and password=password(登录密码)


#
#	2、重置密码
#
update members set password=password(新密码) where id = 读者ID


#########################################################################
#																		#
#						借阅记录										#
#																		#
#########################################################################



#
#	1、获取特定读者的借阅记录信息
#
select br.id , br.borrowNumber , br.bookId , b.name , b.Image , br.bookNumber , b.AuthorId , a.`Name` , b.PublisherId , p.`Name` ,br.createTime , br.sendTime , br.ReceiveTime , br.state 
from borrowrecords br inner join books b on b.Id = br.BookId inner join `authors` a on b.AuthorId = a.Id inner join publishers p on b.PublisherId = p.Id 
where br.MemberId = 读者编号 order by br.state asc , br.CreateTime

#
#	2、取消借阅记录
#
update borrowrecords set state=0 where id=订单编号
update bookDetails set state = 1 where Number=这本书的Number


#
#	3、确认收货
#
update borrowrecords set state=3 where id=订单编号


