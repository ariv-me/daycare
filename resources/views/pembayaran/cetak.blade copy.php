<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="{{asset('resources/sources/assets/images')}}style.css" media="all" />
    <style type="text/css">

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        @page {
			size: A4 potrait;
			margin: 2cm 2cm 2cm 2cm;
		}

        body {
            position: relative;
            /* width: 21cm;  
            height: 29.7cm;  */
            margin: 0 auto; 
            color: #001028;
            background: #FFFFFF; 
            font-family: Arial, sans-serif; 
            font-size: 11px; 
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        /* #logo img {
        
        } */

        h1 {
            border-top: 1px solid  #5D6975;
            border-bottom: 1px solid  #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;        
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;        
            font-weight: normal;
        }

        table .service,
        table .desc {
        text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }


    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img  width="200px" height="80px" src="{{ asset('resources/sources/assets/images/logo.png') }}">
       
      </div>
      <h1>INVOICE 3-2-1</h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div><span>PROJECT</span> Website development</div>
        <div><span>CLIENT</span> John Doe</div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">SERVICE</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Design</td>
            <td class="desc">Creating a recognizable design solution based on the company's existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
          </tr>
          <tr>
            <td class="service">Development</td>
            <td class="desc">Developing a Content Management System-based Website</td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
            <td class="total">$3,200.00</td>
          </tr>
          <tr>
            <td class="service">SEO</td>
            <td class="desc">Optimize the site for search engines (SEO)</td>
            <td class="unit">$40.00</td>
            <td class="qty">20</td>
            <td class="total">$800.00</td>
          </tr>
          <tr>
            <td class="service">Training</td>
            <td class="desc">Initial training sessions for staff responsible for uploading web content</td>
            <td class="unit">$40.00</td>
            <td class="qty">4</td>
            <td class="total">$160.00</td>
          </tr>
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>