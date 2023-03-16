<html>
<head>
    <style>
        @media print {
  #printPageButton {
    display: none;
  }

  @media print {
    head {
        content: none !important;
    }

    @page {
    size: auto;
    margin: 0;
  }
}

}
    </style>
</head>

<body onload="printme();">
<div id="print-content" class="container"  style="position: relative ; text-align: center;">

     <img style="width: 100% ;" src="{{ asset('assets/certificate.jpg') }}">

    <div class="" style=" position: absolute; left: 40%; bottom: 36% ; ">
        <h3 style="font-size: 20px"> {{ $name }} </h3>
    </div>



    <div  class="" style=" font-size:20px; position: absolute; right: 37% ; bottom: 30%">
       {{ $course }}
    </div>

    <div  class="" style=" font-size:18px; position:  absolute; right: 77%; bottom: 29.5%">
        {{ $course_date }}
    </div>
</div>

<button id="printPageButton" onclick="window.print();return false"
>Print this page</button>


<script type="text/javascript">
    function printme() {
        window.print();
        document.body.onmousemove = doneyet;
    }
    function doneyet() {
        document.body.onmousemove = "";
        window.location.href=history.back();
    }
</script>

<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        w=window.open();
        w.document.write(printContents);
        w.print();
        w.close();
    }
</script>

</body>
</html>
