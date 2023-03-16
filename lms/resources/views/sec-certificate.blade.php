<html>
<head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orelega+One&family=Poppins:wght@200&display=swap" rel="stylesheet"> 

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

.name {
    font-family: 'Orelega One', cursive;
}




.course {
    font-family: 'Poppins', sans-serif;

  
}


    </style>
    
</head>
<body >
<div id="print-content" class="container"  style="position: relative ; text-align: center;">

     <img style="width: 100% ;" src="{{ asset('assets/0001.jpg') }}">

    <div class="" style=" position: absolute; left: 30%; bottom: 44% ; ">
        <h3 class="name" style="font-size: 40px"> Alaa Abdelrahman Tair Elbar </h3>
    </div>



    <div class="course" style=" position: absolute; left: 40% ; bottom: 32%">
        <p style="font-size:30px">Data Science 1</p> 
    </div>

    <div class="" style=" position: absolute; left: 45%; bottom: 25%">
        
        <p class="course" style="font-size:30px">2/5/2022</p> 
    </div>
</div>

<button id="printPageButton" onclick="window.print();return false"
>Print this page</button>


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
