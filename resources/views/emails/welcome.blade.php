<DOCTYPE html>
   <html lang="en-US">
     <head>
     <meta charset="utf-8">
     </head>
     <body>
     <h2>   Hi {{$user['name']}}, we’re glad you’re here! Following are your account details: <br>
</h3>
<h3>Email: </h3><p>{{$user['email']}}</p>
<h3>Username: </h3><p>{{$user['username']}}</p>
<h3>Phone: </h3><p>{{$user['phone']}}</p>
</body>
</html>