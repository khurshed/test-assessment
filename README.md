<h1>project description</h1>
<p>Programming Assignment : User REST API<br>
Using any framework of your choice (or core php/python) create a user REST API which will accept two parameters: id, fmt (id is mandatory)<br><br>
<b>Tasks:</b>
Q1. return user attributes in a JSON format (for a single id or multiple ids)<br>
Q2. If fmt is set, return the data in a comma separated format. (for the given id/ids). This doesn’t have to be a file<br>
The data is available in a MySQL DB.
</p>
<h1>How to set up project</h1>

<b>DB connection details:</b><br><br>
host: 165.22.220.75<br>
user: candidate<br>
pass: NSDwL8gfr8Xg<br>
db: extdb<br>
Table: tbl_users<br>

<p>1. clone this project</p>
<p>2. install composer</p>
<p>3. run command : php artisan server</p>
<p>4. end points 
<br>
a. localhost:8000/users
</p>
<h1>main pages on which i have worked</h1>
<p>1. HomeController-> User function</p>
<p>2. custom validation function (ArrayOfIntegers.php in app/Rules)</p>
<p>3. Users model in app/Models/Users</p>
<h1>sample output of users route</h1>
<p> success <br>
if fmt=1
<br>
{
    "users": "Id,Mobile No,Email\\n2,3454354565756,sdfdsfdsgdgdf@sadsad.asd\\n",
    "status": "success",
    "statusCode": 200
}
<br>
if fmt=0 or not not provided
<br>
{
    "users": [
        {
            "id": 2,
            "mobile_no": "3454354565756",
            "email_id": "sdfdsfdsgdgdf@sadsad.asd"
        }
    ],
    "status": "success",
    "statusCode": 200
}
error<br>

{
    "errors": {
        "ids": [
            "The ids must be an array of integer number"
        ]
    },
    "status": "failed",
    "statusCode": 401
}
<br>
{
    "errors": {
        "ids": [
            "The ids is required"
        ]
    },
    "status": "failed",
    "statusCode": 401
}

</p>