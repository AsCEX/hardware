
var print = {
    start: function(p_url) {
        /*var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;*/

        var params = [
            'height='+screen.height,
            'width='+screen.width,
            'fullscreen=yes' // only works in IE, but here for completeness
        ].join(',');

        var myWindow=window.open(p_url,'Purchase Order',params);

        myWindow.moveTo(0,0);
        myWindow.document.close();
        myWindow.focus();
        myWindow.print();
        //myWindow.close();
    }
}