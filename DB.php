friends, moment, mesage, picture, userinfo 

*USERINFO
USER_ID [PK]
USERNAME
PASSWORD
EMAIL
FIRSTNAME
LAST_NAME
IMG_ID [FK]
LAST_LAT
LAST_LNG
TIMESTAMP

*PICTURES
IMG_ID[PK]
IMG
IMG_DT
TIMESTAMP

**MOMENTS
MOMENTS_ID[PK]
MOMENTS_MESSAGE
LONG
LAT
USER_ID [FK]
IMG_ID [FK]
TIMESTAMP

*FRIENDS
FRIENDS_ID[PK]
USERNAME_USER[FK]
USERNAME_FR[FK]
TIMESTAMP
STATUS

**NOTIFICATIONS
N_ID[pk]
TIMESTAMP
USER_ID[fk]
TYPE
LINK_ID[fk]
STATUS

*FRIEND REQUEST
FR_ID[pk]
REQUEST_ID[fk]
TARGET_ID[fk]
TIMESTAMP
STATUS

*MESSAGE
MESSAGE_ID[pk]
SENDER_ID[fk]
RECIVER_ID[fk]
TIMESTAMP
MESSSAGE

**LIKES
LIKE_ID[pk]
MOMETN_ID[fk]
USER_ID[fk]
EMTICON
TIMESTAMP

*COMMENTS
comment_id[pk]
user_id [fk]
momnt_id [fk]
timestamp
comment