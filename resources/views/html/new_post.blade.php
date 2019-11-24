@extends ('layouts.app')

<!DOCTYPE html>
<html>
  <head>
    <title>Create post</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, textarea, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 32px;
      color: #fff;
      z-index: 2;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 50%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 10px 0 #cc0052; 
      }
      .banner {
      position: relative;
	  color: #fff;
      height: 210px;
      
      display: flex;
      justify-content: center;
	  
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: #808080; 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, input:hover::placeholder {
      color: #cc0052;
      }
      .item input:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #cc0052;
      color: #cc0052;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
	  color: #fff;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #cc0052;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #ff0066;
      }
      @media (min-width: 568px) {
      .name-item, .contact-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .contact-item .item {
      width: calc(50% - 8px);
      }
      .name-item input {
      width: calc(50% - 20px);
      }
      .contact-item input {
      width: calc(100% - 12px);
      }
      }
    </style>
  </head>
  @section('content')
  <body>
    <div class="testbox">
      <form action="{{route('post.create')}}" method="post">
        <div class="banner">
          <h1>Create Post</h1>
        </div>
        <div class="item">
          <p>Title</p>
          <div class="name-item">
            <input type="text" name="title"/>
          </div>
        </div>
     
        
        <div class="item">
          <p>Description</p>

          <textarea rows="3" name="body" required></textarea>
        </div>
<select name="category">
  <option value="1">Political</option>
  <option value="2">Sports</option>
  <option value="3">Technology</option>
  <option value="4">Education</option>
</select>
        
        
        
        <div class="btn-block">
          <button type="submit" >SUBMIT</button>
		  <input type="hidden" value="{{Session::token()}}" name="_token">
        </div>
      </form>
    </div>
  </body>
  @endsection
</html>