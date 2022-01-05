<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sky Time Digital - Single Page Application Production">
    <meta name="author" content="">
    <title>Reddit 2.0</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  </head>
<body>

    @extends('layouts.comptry')
    @section('content')
        <navbar></navbar>
        <profile></profile>
    @endsection

    <style scoped>
  .section-wrapper {
  border-left: 2px solid orange;
  width: 70%;
  margin: 0 auto;
  margin-top: 30px;
  padding: 20px 15px;
}

.articles-section {
    margin-top: 50px;
}

.label {
    margin-right: 5px;
    color: orange;
    font-weight: bold;
}
</style>

</body>
</html>
