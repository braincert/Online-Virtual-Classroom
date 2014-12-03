Online Virtual Classroom
================

Easily integrate [BrainCert Virtual classroom](https://www.braincert.com) in your website, CMS, LMS, or app.

BrainCert Virtual Classroom is tailor-made to deliver live classes, meetings, webinars, and conferences to audience anywhere!
Schedule Live Classes, Collect Payments, Record Sessions - all from within your own website.

Try a free hands-on DEMO at [https://www.braincert.com/try-virtual-classroom](https://www.braincert.com/try-virtual-classroom) (No Login required)

If this is your first time here, we recommend you to [signup for your API key](https://www.braincert.com/app/virtualclassroom) first. 


# REST API
BrainCert provides a RESTful interface to the resources in the Virtual Classroom e.g. classes, video recordings, shopping cart, etc. Once your API key has authenticated a BrainCert user, it can call a REST API endpoint using the obtained access token and get the corresponding resources. A simple example is getting the authenticated user's list of live classes using the API endpoint. 

If you are new to REST, you can understand the basics at http://en.wikipedia.com/wiki/REST. Please note that the endpoints support JSON (recommended) and XML. The documentation allows you to get responses using JSON or XML where relevant.

Virtual Classroom API supports scheduling and launching live classes, record sessions in HD (MP4 format), HD audio/video conference, desktop sharing, group chat, file sharing, interactive whiteboards, share presentations, sell classes using shopping cart, create discount coupons - all from within your own website.
BrainCert Virtual Classroom

![BrainCert Virtual Classroom API](https://www.braincert.com/images/bcvc1-3.jpg)


# Documentation

The documentation allows you to get responses using JSON or XML where relevant.

1Schedule a new Live class
2List Classes
3Get Class
4Get Class Launch URL
5Remove Class
6Add Pricing Scheme
7List Pricing Scheme (Shopping cart)
8Remove Pricing Scheme
9Add Class Discount
10List Class Discount
11Remove Class Discount
12List Class Recording
13Get Recorded Class Videos
14Remove Class Recording
15Change Status of Recorded Class
Schedule a new Live class
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/schedule?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/schedule?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Request Requirements

Parameter	Type	Description	Example
title	required	Class title	string
timezone	required	Class timezone	See Full list of time-zone
start_time	required	Start time of class	09:30AM
end_time	required	End time of class	10:30AM
date	required	Date of class	2014-08-15
currency	optional	Currency of class	USD 
See full Currency List at below.
ispaid	optional	For class is free or paid	0 for free, 1 for paid
is_recurring	optional	class recurring	value 1 for recurring
repeat	optional	When class reapats	Value between 1 to 5 
See full Repeat list at below
end_classes_count
OR
end_date	optional	Number for end class,
Class end date	10,
2014-08-20
seat_attendees	optional	Number for attendees in a live class	30
record	optional	Record live class	1 for enable record , 0 for disable record
format	optional	Response data format	xml for xml response,default json response

Response XML Example
https://api.braincert.com/v1/schedule?apikey=WbMlO5sAx1fmV&title=schedule&timezone=33&date=2014-11-11&start_time=09:30 AM&end_time=10:30AM& currency=usd&ispaid=0&is_recurring=1&repeat=1&end_classes_count=10&seat_attendees=10&record=1&format=xml
Success Response

<rsp status="ok">
  <title>schedule</title>
  <method>addclass</method>
  <class_id>12345</class_id>
</rsp>

Error Response

<rsp status="error">
  <method>schedule</method>
  <message>error message</message >
</rsp>

Response JSON Example
https://api.braincert.com/v1/schedule?apikey=WbMlO5sAx1fmV&title=demo-class&timezone=33&date=2014-11-11&start_time=09:30 AM&end_time=10:30AM& currency=usd&ispaid=0&is_recurring=1&repeat=1&end_classes_count=10&seat_attendees=10&record=1
Success Response

[{
   "Status":"OK",
   "method":"addclass",
   "class_id":619,
   "title":"demo-class"
}]

Error Response

[{
   "status":"error",
   "error":"Invalid API KEY"
}]
ADD Pricing Scheme
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/addSchemes?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/addSchemes?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Request Requirements


Parameter	Type	Description	Example
price	required	price of class	10
scheme_days	required	To Give Access for days of class	30
times	required	Access type for limit	0 for unlimited,1 for limited
numbertimes	optional	Number of Times price used in class	12
format	optional	Response data format	xml for xml response,default json response

Response XML Example
https://api.braincert.com/v1/addSchemes?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<rsp status="ok">
  <method>addprice</method>
  <price_id>34</price_id>
</rsp>

Error Response

<rsp status="error">
  <method>addprice</method>
  <message>error message</message >
</rsp>

Response JSON Example
https://api.braincert.com/v1/addSchemes?apikey=WbMlO5sAx1fmV
Success Response

[{
   "Status":"OK",
   "method":"addprice",
   "Price id":34
}]

Error Response

[{
   "Status":" error ",
   "error":"Invalid API KEY"
}]
ADD class Discount
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/addSpecials?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/addSpecials?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Request Requirements


Parameter	Type	Description	Example
discount	required	Discount of class	10
start_date	required	To Give Access for days of class	2014-08-15
end_date	optional	Discount expires	2014-08-15
discount_type	required	Discount type in class	0 for fixed_amount ,1 for percentage
discount_code	optional	Discount coupon code	Couponcode
discount_limit	optional	How many times can this discount be used?	20
format	optional	Response data format	xml for xml response,default json response

Response XML Example
https://api.braincert.com/v1/addSpecials?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<rsp status="ok">
  <method>addDiscount</method>
  <discount_id>12345</discount_id>
</rsp>

Error Response

<rsp status="error">
  <method>addDiscount</method>
  <message>error message</message >
</rsp>

Response JSON Example
https://api.braincert.com/v1/addSpecials?apikey=WbMlO5sAx1fmV
Success Response

[{
  "Status":"OK",
  "method":"addDiscount",
  "Discount id":40
}]

Error Response

[{
  "status":"error",
  "error":"Invalid API KEY"
}]
Remove class Discount
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/removediscount?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/removediscount?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Request Requirements


Parameter	Type	Description	Example
discountid	required	Discount class id	10
format	optional	Response data format	xml for xml response,default json response

Response XML Example
https://api.braincert.com/v1/removediscount?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<rsp status="ok">
  <method>removediscount</method>
  <discount_id>12345</discount_id>
</rsp>

Error Response

<rsp status="error">
  <method>removediscount</method>
  <message>error message</message >
</rsp>

Response JSON Example
https://api.braincert.com/v1/removediscount?apikey=WbMlO5sAx1fmV
Success Response

[{
   "status":"ok",
   "method":"removediscount",
   "discount_id":"40"
}]

Error Response

[{
  "status":"error",
  "error":"Invalid API KEY"
}]
Remove Pricing Scheme
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/removeprice?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/removeprice?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Request Requirements


Parameter	Type	Description	Example
id	required	Price id of class	10
format	optional	Response data format	xml for xml response,default json response

Response XML Example
https://api.braincert.com/v1/removeprice?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<rsp status="ok">
  <method>removeprice</method>
  <price_id>12345</price_id>
</rsp>

Error Response

<rsp status="error">
  <method>removeprice</method>
  <message>error message</message >
</rsp>

Response JSON Example
https://api.braincert.com/v1/removeprice?apikey=WbMlO5sAx1fmV
Success Response

[{
   "status":"ok",
   "method":"removeprice",
   "price_id":"34"
}]

Error Response

[{
  "status":"error",
  "error":"Invalid API KEY"
}]
Remove class
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/removeclass?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/removeclass?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Request Requirements


Parameter	Type	Description	Example
cid	required	class id	10
format	optional	Response data format	xml for xml response,default json response

Response XML Example
https://api.braincert.com/v1/removeclass?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<rsp status="ok">
  <method>removeclass</method>
  <class_id>12345</class_id>
</rsp>

Error Response

<rsp status="error">
  <method>removeclass</method>
  <message>error message</message >
</rsp>

Response JSON Example
https://api.braincert.com/v1/removeclass?apikey=WbMlO5sAx1fmV
Success Response

[{
   "status":"ok",
   "method":"removeclass",
   "class_id":"34"
}]

Error Response

[{
  "status":"error",
  "error":"Invalid API KEY"
}]
List class Discount
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/listdiscount?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/listdiscount?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Request Requirements


Parameter	Type	Description	Example
class_id	required	Class id	10
format	optional	Response data format	xml for xml response,default json response

Response XML Example
https://api.braincert.com/v1/listdiscount?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<xml>
 <classid>528</classid>
  <discount>
   <discountid>14</discountid>
   <discount>10</discount>
   <discount_code>dfdfdf</discount_code>
   <discount_limit>0</discount_limit>  <discount_type>percentage</discount_type>
  <start_date>2014-05-27</start_date>
  <end_date>Unlimited</end_date>
 </discount>
</xml>

Error Response

<rsp status="error">
   <errors> error </ errors >
</rsp>

Response JSON Example
https://api.braincert.com/v1/listdiscount?apikey=WbMlO5sAx1fmV
Success Response

[{
   "id":"37",
   "class_id":"598",
   "discount_code":"100code",
   "is_use_discount_code":"1",
   "discount_limit":"55",
   "is_no_limit":"0",
   "discount_type":"fixed_amount",
   "special_price":"100",
   "start_date":"2014-09-01 00:00:00",
   "end_date":"0000-00-00 00:00:00",
   "is_never_expire":"1"
}]

Error Response

[{
  "status":"error",
  "error":"Invalid API KEY"
}]
List class Price
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/listSchemes?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/listSchemes?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Request Requirements


Parameter	Type	Description	Example
class_id	required	Class id	10
format	optional	Response data format	xml for xml response,default json response

Response XML Example
https://api.braincert.com/v1/listSchemes?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<xml>
 <classid>585</classid>
 <Price>
   <id>29</id>
   <class_id>585</class_id>
   <scheme_price>30</scheme_price>
   <scheme_days>2</scheme_days>
   <lifetime>0</lifetime>
   <times>0</times>
   <numbertimes>0</numbertimes>
  </Price>
</xml>

Error Response

<rsp status="error">
   <errors> error </ errors >
</rsp>

Response JSON Example
https://api.braincert.com/v1/listSchemes?apikey=WbMlO5sAx1fmV
Success Response

[{
   "id":"29",
   "class_id":"598",
   "scheme_price":"30",
   "scheme_days":"2",
   "lifetime":"0",
   "times":"0",
   "numbertimes":"0"
 },
 {
   "id":"30",
   "class_id":"598",
   "scheme_price":"50",
   "scheme_days":"33",
   "lifetime":"0",
   "times":"0",
   "numbertimes":"0"
}]

Error Response

[{
  "status":"error",
  "error":"Invalid API KEY"
}]
List classes
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/listclass?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/listclass?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Parameter	Type	Description	Example
format	optional	Response data format	xml for xml response,default json response


Response XML Example
https://api.braincert.com/v1/listclass?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<xml>
 <userid>43</userid>
  <class>
    <id>621</id>
    <user_id>43</user_id>
    <title>abcd</title>
    <date>2014-09-24</date>
    <start_time>9:45 PM</start_time>
    <end_time>10:15PM</end_time>
    <timezone>33</timezone>
    <end_date>0000-00-00</end_date>
    <description/>
    <record>0</record>
    <privacy>0</privacy>
    <ispaid>0</ispaid>
    <currency>usd</currency>
    <status>Past</status>
  </class>
</xml>

Error Response

<rsp status="error">
   <errors> error </ errors >
</rsp>

Response JSON Example
https://api.braincert.com/v1/listclass?apikey=WbMlO5sAx1fmV
Success Response

[{
   "id":"618",
   "user_id":"43",
   "title":"test-api",
   "date":"2014-09-24",
   "start_time":"9:45 PM",
   "end_time":"10:15PM",
   "timezone":"33",
   "end_date":"0000-00-00",
   "description":"","record":"0",
   "privacy":"0",
   "ispaid":"0",
   "currency":"usd",
   "status":"Past"   
}]

Error Response

[{
  "status":"error",
  "error":"Invalid API KEY"
}]
Get class
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/getclass?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/getclass?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Parameter	Type	Description	Example
class_id	required	Class id	10
format	optional	Response data format	xml for xml response,default json response


Response XML Example
https://api.braincert.com/v1/getclass?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<xml>
  <userid>43</userid>
  <class>
    <id>682</id>
    <user_id>43</user_id>
    <title>apitestclass</title>
    <date>2014-11-13</date>
    <start_time>03:10 PM</start_time>
    <end_time>04:20 PM</end_time>
    <timezone>33</timezone>
    <end_date>0000-00-00</end_date>
    <description/>
    <record>0</record>
    <privacy>0</privacy>
    <ispaid>1</ispaid>
    <currency>usd</currency>
    <status>Live</status>
  </class>
</xml>

Error Response

<rsp status="error">
   <errors> error </ errors >
</rsp>

Response JSON Example
https://api.braincert.com/v1/getclass?apikey=WbMlO5sAx1fmV
Success Response

[{
    "id":"682",
    "user_id":"43",
    "title":"apitestclass",
    "date":"2014-11-13",
    "start_time":"03:10 PM",
    "end_time":"04:20 PM",
    "timezone":"33",
    "end_date":"0000-00-00",
    "description":"",
    "record":"0",
    "ispaid":"1",
    "currency":"usd",
    "status":"Live",
    "privacy":"0"
}]

Error Response

[{
  "status":"error",
  "error":"Invalid API KEY"
}]
Get Class Launch URL
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/getclasslaunch?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/getclasslaunch?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Request Requirements


Parameter	Type	Description	Example
class_id	required	Class id	10
userId	required	User id	35
userName	required	User Name	string
isTeacher	required	isTeacher	0 for Student,1 for teacher
lessonName	required	lesson Name	string
courseName	required	Course Name	string
format	optional	Response data format	xml for xml response,default json response

Response XML Example
https://api.braincert.com/v1/getclasslaunch?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<rsp status="ok">
   <method>getclasslaunch</method>
   <class_id>682</class_id>
   <launchurl>https://api.braincert.com/live/launch.php?roomId=682&apiKey=7UrWbMlO5sAx1fmVlPHK&userId=320&userName=asdas&isTeacher=1&courseName=asdasd&lessonName=sad&lessonTime=130&isRecord=0</launchurl>
</rsp>

Error Response

<rsp status="error">
   <errors> error </ errors >
</rsp>

Response JSON Example
https://api.braincert.com/v1/getclasslaunch?apikey=WbMlO5sAx1fmV
Success Response

{
    status :  ok,
    class_id :  682,
    method :  getclasslaunch,
    launchurl :  https://api.braincert.com/live/launch.php?roomId=682&apiKey=7UrWbMlO5sAx1fmVlPHK&userId=352&userName=tsetest&isTeacher=0&courseName=democourse&lessonName=testlesson&lessonTime=130&isRecord=0

}

Error Response

[{
  "status":"error",
  "error":"Invalid API KEY"
}]
List Class Recording
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/getclassrecording?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/getclassrecording?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Request Requirements


Parameter	Type	Description	Example
class_id	required	Class id	10
format	optional	Response data format	xml for xml response,default json response

Response XML Example
https://api.braincert.com/v1/getclassrecording?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<xml>
  <classid>21</classid>
   <recordclass>
     <id>6</id>
     <classroom_id>21</classroom_id>
     <user_id>43</user_id>
      <name>video1369233387010_650002050.flv</name>
     <fname/>
     <status>1</status>
     <date_recorded>2014-12-31</date_recorded>
   </recordclass>
</xml>

Error Response

<rsp status="error">
   <errors> error </ errors >
</rsp>

Response JSON Example
https://api.braincert.com/v1/getclassrecording?apikey=WbMlO5sAx1fmV
Success Response

[{
	"id":"6",
	"classroom_id":"52",
	"user_id":"0",
	"name":"video1369233387010_650002050.flv",
	"fname":"",
	"status":"1",
	"date_recorded":"1969-12-31"
},
{
	"id":"8",
	"classroom_id":"52",
	"user_id":"0",
	"name":"video1369231601092_104397168.mp4",
	"fname":"","status":"0",
	"date_recorded":"1969-12-31"
}]

Error Response

[{
  "status":"error",
  "error":"Invalid API KEY"
}]
Get Recorded Class Videos
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/getrecording?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/getrecording?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Parameter	Type	Description	Example
record_id	required	Record id	10
format	optional	Response data format	xml for xml response,default json response


Response XML Example
https://api.braincert.com/v1/getrecording?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<xml>
	<classid>483</classid>
	<recordclass>
	<id>114</id>
	<classroom_id>483</classroom_id>
	<user_id>43</user_id>
	<name>20143142521video_483_480325_ready.mp4</name>
	<status>1</status>
	<date_recorded>2014-04-28</date_recorded>
	<record_url>https://dm0d88zfsyhg8.cloudfront.net/20143142521video_483_480325_ready.mp4?Expires=1411640645 </record_url>
	</recordclass> 
</xml>

Error Response

<rsp status="error">
   <errors> error </ errors >
</rsp>

Response JSON Example
https://api.braincert.com/v1/getrecording?apikey=WbMlO5sAx1fmV
Success Response

[{
	"id":"114",
	"classroom_id":"483",
	"user_id":"43",
	"name":"20143142521video_483_480325_ready.mp4",
	"fname":"",
        "status":"1",
	"date_recorded":"2014-04-28",
	"record_url":"https:\/\/dm0d88zfsyhg8.cloudfront.net\/20143142521video_483_480325_ready.mp4?Expires=1411640160&Signature=WmXk3GV3DMZ7xFHpn9~oRxAG5vbjtTMN~399bZhbF7UPAKJ-xJnKXGPENJffbq5fnsDydb3jAK7vA0O2l5pcz-MPkjqWz13Fg6hPGiT4Vo57gyVe3H9kBWtEAjmZrPaiMMgSweqslx5f9Ytq7D59tez3~qG3pfwW0r59iI8gKHI_&Key-Pair-Id=APKAINGTP6O5WANPM7YQ"
}]

Error Response

[{
  "status":"error",
  "error":"Invalid API KEY"
}]
Remove Class Recording
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/removeclassrecording?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/removeclassrecording?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Parameter	Type	Description	Example
id	required	Class recording id	10
format	optional	Response data format	xml for xml response,default json response


Response XML Example
https://api.braincert.com/v1/removeclassrecording?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<xml>
<rsp status="ok">
	<method>removeclassrecording</method>
	<record_id>123</record_id>
</rsp>

Error Response

<rsp status="error">
   <errors> error </ errors >
</rsp>

Response JSON Example
https://api.braincert.com/v1/removeclassrecording?apikey=WbMlO5sAx1fmV
Success Response

[{
  "status":"OK",
  "method":"removeclassrecording",
  "record_id":"10"
}]

Error Response

[{
  "status":"error",
  "error":"Invalid API KEY"
}]
Change Status of Recorded Class
Method : POST

Base URL : https://api.braincert.com

API Endpoint : /v1/changestatusrecording?apikey=YOUR_API_KEY_HERE

All requests are POST and sent to https://api.braincert.com/v1/changestatusrecording?apikey=YOUR_API_KEY_HERE You will retrieve results assuming you have added your appKey, and require parameter.


Parameter	Type	Description	Example
id	required	Class recording id	10
format	optional	Response data format	xml for xml response,default json response


Response XML Example
https://api.braincert.com/v1/changestatusrecording?apikey=WbMlO5sAx1fmV&format=xml
Success Response

<xml >
	<rsp status="ok">
		<method>changestatusrecording</method>
	  	<record_id>123</record_id>
	</rsp>
</xml>

Error Response

<rsp status="error">
   <errors> error </ errors >
</rsp>

Response JSON Example
https://api.braincert.com/v1/changestatusrecording?apikey=WbMlO5sAx1fmV
Success Response

[{
   "status":"ok",
   "method":"changestatusrecording",
   "record_id":"20"
}]

Error Response

[{
  "status":"error",
  "error":"Invalid API KEY"
}]

Currency List
AUD 
CAD 
EUR 
GBP 
NZD 
USD

Repeat List
1 =>Daily (all 7 days)
2=>6 Days(Mon-Sat)
3=>5 Days(Mon-Fri)
4=>Weekly
5=>Once every month

TimeZone List
28=>(GMT) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London
30=>(GMT) Monrovia, Reykjavik
72=>(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna
53=>(GMT+01:00) Brussels, Copenhagen, Madrid, Paris
14=>(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb
71=>(GMT+01:00) West Central Africa
83=>(GMT+02:00) Amman
84=>(GMT+02:00) Beirut
24=>(GMT+02:00) Cairo
61=>(GMT+02:00) Harare, Pretoria
27=>(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius
35=>(GMT+02:00) Jerusalem
21=>(GMT+02:00) Minsk
86=>(GMT+02:00) Windhoek
31=>(GMT+03:00) Athens, Istanbul, Minsk
2=>(GMT+03:00) Baghdad
49=>(GMT+03:00) Kuwait, Riyadh
54=>(GMT+03:00) Moscow, St. Petersburg, Volgograd
19=>(GMT+03:00) Nairobi
87=>(GMT+03:00) Tbilisi
34=>(GMT+03:30) Tehran
1=>(GMT+04:00) Abu Dhabi, Muscat
88=>(GMT+04:00) Baku
9=>(GMT+04:00) Baku, Tbilisi, Yerevan
89=>(GMT+04:00) Port Louis
47=>(GMT+04:30) Kabul
25=>(GMT+05:00) Ekaterinburg
90=>(GMT+05:00) Islamabad, Karachi
73=>(GMT+05:00) Islamabad, Karachi, Tashkent
33=>(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi
62=>(GMT+05:30) Sri Jayawardenepura
91=>(GMT+05:45) Kathmandu
42=>(GMT+06:00) Almaty, Novosibirsk
12=>(GMT+06:00) Astana, Dhaka
41=>(GMT+06:30) Rangoon
59=>(GMT+07:00) Bangkok, Hanoi, Jakarta
50=>(GMT+07:00) Krasnoyarsk
17=>(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi
46=>(GMT+08:00) Irkutsk, Ulaan Bataar
60=>(GMT+08:00) Kuala Lumpur, Singapore
70=>(GMT+08:00) Perth
63=>(GMT+08:00) Taipei
65=>(GMT+09:00) Osaka, Sapporo, Tokyo
77=>(GMT+09:00) Seoul
75=>(GMT+09:00) Yakutsk
10=>(GMT+09:30) Adelaide
4=>(GMT+09:30) Darwin
20=>(GMT+10:00) Brisbane
5=>(GMT+10:00) Canberra, Melbourne, Sydney
74=>(GMT+10:00) Guam, Port Moresby
64=>(GMT+10:00) Hobart
69=>(GMT+10:00) Vladivostok
15=>(GMT+11:00) Magadan, Solomon Is., New Caledonia
44=>(GMT+12:00) Auckland, Wellington
26=>(GMT+12:00) Fiji, Kamchatka, Marshall Is.
6=>(GMT-01:00) Azores
8=>(GMT-01:00) Cape Verde Is.
39=>(GMT-02:00) Mid-Atlantic
22=>(GMT-03:00) Brasilia
94=>(GMT-03:00) Buenos Aires
55=>(GMT-03:00) Buenos Aires, Georgetown
29=>(GMT-03:00) Greenland
95=>(GMT-03:00) Montevideo
45=>(GMT-03:30) Newfoundland
3=>(GMT-04:00) Atlantic Time (Canada)
57=>(GMT-04:00) Georgetown, La Paz, San Juan
96=>(GMT-04:00) Manaus
51=>(GMT-04:00) Santiago
76=>(GMT-04:30) Caracas
56=>(GMT-05:00) Bogota, Lima, Quito
23=>(GMT-05:00) Eastern Time (US &amp; Canada)
67=>(GMT-05:00) Indiana (East)
11=>(GMT-06:00) Central America
16=>(GMT-06:00) Central Time (US &amp; Canada)
37=>(GMT-06:00) Guadalajara, Mexico City, Monterrey
7=>(GMT-06:00) Saskatchewan
68=>(GMT-07:00) Arizona
38=>(GMT-07:00) Chihuahua, La Paz, Mazatlan
40=>(GMT-07:00) Mountain Time (US &amp; Canada)
52=>(GMT-08:00) Pacific Time (US &amp; Canada)
104=>(GMT-08:00) Tijuana, Baja California
48=>(GMT-09:00) Alaska
32=>(GMT-10:00) Hawaii
58=>(GMT-11:00) Midway Island, Samoa
18=>(GMT-12:00) International Date Line West
105=>(GMT-4:00) Eastern Daylight Time (US &amp; Canada)
13=>GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague

