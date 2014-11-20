## 常量
* Base_URL = http://121.199.26.162/api/
* Platform = (1: weibo 2: )

## 接口
### GET posts
获取数据列表

Params:
 * since_id int [可选] 大于该ID的数据
 * max_id int [可选] 小于该ID的数据

Response:
    {
        "code": 0, 
        "data": {
             "items": [ [PostItem](API#postitem) ]
        }
    }

### GET posts?a=candidates
获取待审核的帖子

Params:
 * since_id int [可选] 大于该ID的数据

Response:
{
    "code": 0, 
    "data": {
          "items": [ [PostItem](API#postitem) ]
    }
}

### POST posts?a=like
喜欢

Params:
* id int 

Response:

### POST posts?a=dislike
不喜欢

Params:
* id int 

Response:

### POST posts?a=repost
转发

Params:
* id int 

Response:

###
### POST posts?a=favorite
收藏

Params:
* id int 

Response:

### GET notifications?a=new_posts_count
获取新post数据条数

Params:
 * since_id int 大于该ID的数据

Response:
    
    "data": {
        "new_posts_count": "13"
    }

### GET comments
获取评论
Params:
* pid int
* text string

Response:
{
    "code": 0, 
    "data": {
          "items": [ [CommentItem](API#commentitem) ]
    }
}

### POST comments?a=create
创建评论
Params:
* pid int
* text string

### POST users?a=bind
绑定用户
Params:
* platform int
* suserid string
* susername string
* suseravatar file

Response:

### POST users?a=login
登陆
Params:
* uid int

Response:


## 数据结构

### PostItem
帖子数据项

    {
            "id": 109, 
            "img": "http://ww4.sinaimg.cn/large/82450bb6jw1e4qhivbzfsg20ak05k10c.gif", 
            "img_filesize": 290853, 
            "img_height": 200, 
            "img_width": 380, 
            "likes": 1, // 喜欢数
            "favorites": 1, // 收藏数
            "reposts": 1, // 转发数
            "comments": 1, // 评论数            
            "suername": "囧创意", // 微博用户名
            "suserid": 2185563062, 
            "created_at": "2013-05-16 16:05:02", 
            "dislikes": null, 
            "text": "请珍惜你身边那个容易上当受骗的盆友。。。（更多搞笑图片，创意图片请关注@囧创意）"
     }

### CommentItem
评论数据项

    {
            "avatar": "http://a.com/a.jpg", 
            "created_at": "2013-05-21 12:52:08", 
            "id": 2, 
            "nickname": "aa", 
            "text": "hello", 
            "uid": 1
    }


