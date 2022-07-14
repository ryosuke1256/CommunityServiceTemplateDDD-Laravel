## users

|       Name        |     Type     | Nullable | Unique | Default | Description |
| :---------------: | :----------: | :------: | :----: | :-----: | :---------: |
|        id         |  bigint(20)  |    No    |  Yes   |  Null   | primary key |
|       name        | varchar(255) |    No    |   No   |  Null   |             |
|       email       | varchar(255) |    No    |  Yes   |  Null   |             |
| email_verified_at |  timestamp   |   Yes    |   No   |  Null   |             |
|     passward      | varchar(255) |    No    |   No   |  Null   |             |
|  remember_token   | varchar(100) |   Yes    |   No   |  Null   |             |
|    created_at     |  timestamp   |   Yes    |   No   |  Null   |             |
|    updated_at     |  timestamp   |   Yes    |   No   |  Null   |             |

## articles

|       Name        |    Type    | Nullable | Unique | Default | Description |
| :---------------: | :--------: | :------: | :----: | :-----: | :---------: |
|        id         | bigint(20) |    No    |  Yes   |  Null   | primary key |
|      user_id      | bigint(20) |    No    |  Yes   |  Null   | foreign key |
| article_status_id | bigint(20) |    No    |  Yes   |  Null   | foreign key |
|       title       |    text    |    No    |   No   |  Null   |             |
|      content      |  longtext  |    No    |   No   |  Null   |             |
|    created_at     | timestamp  |   Yes    |   No   |  Null   |             |
|    updated_at     | timestamp  |   Yes    |   No   |  Null   |             |
|    deleted_at     | timestamp  |   Yes    |   No   |  Null   |             |

## article_article_category

|        Name         |    Type    | Nullable | Unique | Default | Description |
| :-----------------: | :--------: | :------: | :----: | :-----: | :---------: |
|         id          | bigint(20) |    No    |  Yes   |  Null   | primary key |
| article_category_id | bigint(20) |    No    |  Yes   |  Null   | foreign key |
|     article_id      | bigint(20) |    No    |  Yes   |  Null   | foreign key |
|     created_at      | timestamp  |   Yes    |   No   |  Null   |             |
|     updated_at      | timestamp  |   Yes    |   No   |  Null   |             |

## article_categories

|         Name          |     Type     | Nullable | Unique | Default | Description |
| :-------------------: | :----------: | :------: | :----: | :-----: | :---------: |
|          id           |  bigint(20)  |    No    |  Yes   |  Null   | primary key |
| article_category_name | varchar(255) |    No    |  Yes   |  Null   |             |
|      created_at       |  timestamp   |   Yes    |   No   |  Null   |             |
|      updated_at       |  timestamp   |   Yes    |   No   |  Null   |             |

## article_statuses

|        Name         |     Type     | Nullable | Unique | Default | Description |
| :-----------------: | :----------: | :------: | :----: | :-----: | :---------: |
|         id          |  bigint(20)  |    No    |  Yes   |  Null   | primary key |
| article_status_name | varchar(255) |    No    |  Yes   |  Null   |             |
|     created_at      |  timestamp   |   Yes    |   No   |  Null   |             |
|     updated_at      |  timestamp   |   Yes    |   No   |  Null   |             |

## article_comments

|          Name           |    Type    | Nullable | Unique | Default | Description |
| :---------------------: | :--------: | :------: | :----: | :-----: | :---------: |
|           id            | bigint(20) |    No    |  Yes   |  Null   | primary key |
|       article_id        | bigint(20) |    No    |  Yes   |  Null   | foreign key |
|         user_id         | bigint(20) |    No    |  Yes   |  Null   | foreign key |
|  article_comment_title  |    text    |    No    |   No   |   ''    |             |
| article_comment_content |  longtext  |    No    |   No   |  Null   |             |
|       created_at        | timestamp  |   Yes    |   No   |  Null   |             |
|       updated_at        | timestamp  |   Yes    |   No   |  Null   |             |
|       deleted_at        | timestamp  |   Yes    |   No   |  Null   |             |
