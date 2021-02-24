@extends('layouts.app')

@section('content')
<style>
    body {
  .book {
  margin: 0;
  padding: 0;
  background-color: #FAFAFA;
  font: 12pt "Tahoma";
}

* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.page {
  display: block;
  width: calc(100 / 23 * 21vw);
  height: calc(100 / 23 * 29.7vw);
  margin: calc(100 / 23 * 1vw) auto;
  border: 1px #D3D3D3 solid;
  border-radius: 5px;
  background: white;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.subpage {
  margin: calc(100 / 23 * 1vw);
  width: calc(100 / 23 * 19vw);
  height: calc(100 / 23 * 27.7vw);
  outline: 0cm #FAFAFA solid;
}

@page {
  size: A4;
  margin: 0;
}

@media print {
  .page {
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
  }
}
</style>
    
<page size="A4">
<div class="container-fluid">
  <div class="book">
    <div class="page">
      HEADER
      <div class="subpage" id='editor-container'>CONTENT</div>
    </div>
  </div>
</div>

</page>
@endsection