<div class="footer text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                Made for developers by Alessandro Pietrantonio - <a href="" id="cntctm" style="font-size: inherit;">Contact me</a>
            </div>
        </div>
    </div>
</div>

@section('footerscripts')
    @parent

    <script type="text/javascript" language="javascript">
        emailMe();
        // Email obfuscator script 2.1 by Tim Williams, University of Arizona
        // Random encryption key feature coded by Andrew Moulden
        // This code is freeware provided these four comment lines remain intact
        // A wizard to generate this code is at http://www.jottings.com/obfuscator/
        function emailMe() {
            coded = "9giFz2fFpfgp.2biVV2f6zp@XL2gb.OpL"
            key = "xHlRqEYpcfeGDjgdQAMIJraNFusLS3CkWh7bo8n19Oyivw0X6T5PZtz2m4UVBK"
            shift=coded.length
            link=""
            for (i=0; i<coded.length; i++) {
                if (key.indexOf(coded.charAt(i))==-1) {
                ltr = coded.charAt(i)
                link += (ltr)
                }
                else {
                ltr = (key.indexOf(coded.charAt(i))-shift+key.length) % key.length
                link += (key.charAt(ltr))
                }
            }
            document.getElementById('cntctm').setAttribute('href', link);
        }
        </script><noscript>Sorry, you need Javascript on to email me.</noscript>


@endsection
