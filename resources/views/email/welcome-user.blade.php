@extends('email.main')
@section('content')
    <html>

    <head>
        <title>welcome email user</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- <meta http-equiv="content-type" content="text/html; charset=windows-1252" /> -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <style>
            @font-face {
                font-family: "FuturaPTBold";
                src: url('{{ asset('assets/fonts/FuturaPTBold.otf') }}');
            }

            @font-face {
                font-family: "FuturaPT";
                src: url('{{ asset('assets/fonts/FuturaPTBook.otf') }}');
            }

            @font-face {
                font-family: "FuturaPTCondMedium";
                src: url('{{ asset('assets/fonts/FuturaPTCondMedium.otf') }}');
            }

            @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

            * {
                margin: 0;
                padding: 0;
                font-family: 'Roboto', sans-serif;
            }

            html,
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                font-family: 'Roboto', sans-serif;
                /* font-family: "FuturaPT"; */
                font-family: 'Roboto', sans-serif;

                font-size: 12px;
                font-style: normal;
                color: #000000;
                font-variant: normal;
                height: auto;
                word-break: break-word;
                overflow-x: hidden;
            }

            b,
            strong {
                font-family: 'Roboto', sans-serif;
                /* font-family: "FuturaPTBold"; */

            }

            h1 {
                font-size: 32px;
                line-height: 52px;
                font-family: 'Roboto', sans-serif;
            }

            h2 {
                font-size: 24px;
                line-height: 31px;
            }

            h3 {
                font-size: 20px;
                line-height: 26px;
            }

            h4 {
                font-size: 16px;
                line-height: 21px;

            }

            table {
                font-size: 10px;
            }

            h1,
            h2,
            h3,
            h4 {
                font-family: 'Roboto', sans-serif;
                text-align: center;

            }

            h1 b,
            h2 b,
            h3 b,
            h4 b {
                font-family: 'Roboto', sans-serif;
            }

            p {
                font-size: 16px;
                line-height: 21px;
                text-align: center;
                font-weight: normal;
                color: #000000;
            }

            h5 {
                font-size: 20px;
                line-height: 26px;
                text-align: center;
                font-family: 'Roboto', sans-serif;
                /* font-family: "FuturaPT"; */
            }

            h6 {
                font-size: 12px;
                line-height: 16px;
                text-align: center;
            }

            .header-row {
                text-align: center;
                height: 100px;
                /* box-shadow: 0px 0px 40px #0000005e; */
            }

            /*  .header {
          background-color: #ff6600;
        } */


            .inner-container {
                padding: 40px 30px 0px 30px;
            }

            .image {
                height: 213px;
                width: 100%;
                border-radius: 8px;
            }

            .line {
                width: 100%;
                max-width: 400px;
                text-align: center;
                border: 1px solid #e3e6e5;
                margin-bottom: 30px !important;
                margin-top: 30px !important;
                margin: auto;
            }

            .line3 {
                width: 100%;
                max-width: 400px;
                text-align: center;
                border: 1px solid #e3e6e5;
                margin-bottom: 40px !important;
                margin-top: 35px !important;
                margin: auto;
            }


            .second-image {
                height: 193px;
                max-width: 260px;
                width: 100%;
                border-radius: 8px;
                margin-bottom: 17px;
            }

            .icon-row {
                display: flex;
                margin-bottom: 40px;
                align-items: center;
            }

            .star-icon {
                height: 22px;
                width: 22px;
                margin-right: 13px;
            }

            .rating {
                margin-right: 13px;
            }

            .review {
                color: #afb6bd;
            }

            .first-para {
                font-size: 20px;
                line-height: 26px;
                text-align: center;
                color: #22201E;
                margin-bottom: 50px;
            }

            .activity-btn {
                width: 250px;
                height: 52;
                border: none;
                background: #ffffff 0% 0% no-repeat padding-box;
                box-shadow: 0px 3px 20px #00000029;
                opacity: 1;
                letter-spacing: 0px;
                color: #22201e;
                font-size: 20;
                line-height: 21px;
                text-transform: uppercase;
                font-family: 'Roboto', sans-serif;
                /* font-family: "FuturaPTBold"; */

            }

            .check-icon {
                height: 15px;
                width: 15px;
                vertical-align: middle;
                display: inline-flex;
                position: relative;
                top: 7px;
            }

            .listing {
                list-style-type: none;
                padding-left: 0px;

                /* margin-bottom: 4.16vw; */
                margin: 0px;
                /* margin-top: 1.041vw; */
            }

            /* .list {
          margin-bottom: 9px;
        } */

            .text {
                margin-left: 15px;

                font-family: 'Roboto', sans-serif;
                /* font-family: "FuturaPT"; */
                font-size: 16px;
                line-height: 21px;
                font-style: normal;
                font-variant: normal;
                font-weight: normal;
                letter-spacing: 0px;
                color: #000000;
                opacity: 1;
            }

            .list-row1 {
                display: grid;
                justify-content: center;

            }

            .list-row {
                padding: 0px 4%;
            }

            .footer {
                background: #f8f8f8 0% 0% no-repeat padding-box;
                box-shadow: 0px 0px 40px #00000029;
                opacity: 1;
            }

            .footer-first {
                font-size: 16px;
                line-height: 21px;
                color: #54616C;
            }

            .footer-mail {
                text-decoration: auto;
                color: #54616C;
                margin-bottom: 20px;
                display: block;
            }

            table {
                width: 100%;
            }

            /* table tr td {
                        border: solid black 1px;
                    } */

            tr.equal td {
                width: calc(100% / 4);
            }

            .green {
                color: #757061;
            }

            .listing li {
                display: flex;
                text-align: left !important;
                margin-bottom: 15px !important;
            }

            @media only screen and (max-width: 438px) {
                .custom-break-table td {
                    display: contents;
                }

                .custom-break-table .second-image {
                    max-width: 100%;
                }

                .custom-template-btn {
                    width: 250px;
                    display: block;
                    margin: auto;
                    text-align: center;
                }
            }

            @media only screen and (min-width:320px) and (max-width:480px) {
                .listing li {
                    text-align: left !important;
                }

                .heading-table {
                    margin-bottom: 18px;
                }

                span.text {
                    font-size: 18px !important;
                }

                p {
                    font-size: 18px !important;
                }

                .custom-tite-pera {
                    margin-bottom: 20px;
                }

                .third-para {
                    padding: 0px !important;
                }

                h1 {
                    font-size: 23px !important;
                    padding: unset !important;
                    line-height: 35px;
                }

                h2 {
                    font-size: 21px !important;
                    line-height: 40px;
                }

                h4 {
                    font-size: 20px !important;
                    line-height: 40px;
                }

                .image {
                    height: unset;
                }
            }

            @media only screen and (max-width: 383px) {
                .custom-template-btn {
                    width: 250px;
                    display: block;
                    margin: auto;
                    text-align: center;
                }

                .inner-container table {
                    padding: 0px !important;
                }
            }
        </style>
    </head>

    <body
        style="
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      background-color: #ffffff;
    "
        data-new-gr-c-s-check-loaded="8.872.0" data-gr-ext-installed="">
        <div
            style="
        max-width: 600px;
        margin: auto;
        width: 100%;
        background-color: white;
      ">
            @include('email.header')

            <div class="inner-container">
                <table style="width: 100% ; display:block;">
                    <tbody style="display:block;">
                        <tr style="display:block;">
                            <td colspan="4" style="display:block;">
                                <h1 style="color:#000 !important;
                  text-transform: uppercase !important; text-align: center;">WELCOME TO IWS-2022</h1>
                                <h2
                                    style="margin-bottom: 30px; color:#000 !important;
              text-transform: uppercase !important; text-align: center;">
                                    Thanks for setting up an account
                                </h2>
                                <p class="first-para" style="text-align: center;">
                                    Dear Delegate,
We are glad to welcome you to Indore World Summit 2022, Central India’s biggest model UN conference, brought to you in partnership with AFS India and UpGrad. We regard our delegates as members of our family and look forward to providing you with a rewarding conference. Your decision to select IWS to add value to your MUNning journey is much appreciated.
Please find attached with this mail the document having the UPI QR code. If you choose to pay online, reply to this email with the following information:
Name:
Mobile number:
email id,  
School (same as the details provided during registration) and, 
a screenshot of the payment.
Once we have received the confirmation of the payment, the confirmation of the registration will be reflected on the dashboard.   

                                </p>
                            </td>
                        </tr>

                        <!-- hide for now -->


                        <tr style="display:block;">
                            <td colspan="4" style="display:block;">
                                <div style="text-align: center">
                                    <!-- hide for now -->
                                    <!-- <a href="{{ env('LANDING_PAGE', 'JavaScript:void(0)') }}" style="display:block; text-align:center;"><img class="custom-template-btn" src="{{ asset('assets/images/browser-activity.png') }}" /></a> -->

                                </div>

                                <hr style="margin-bottom:35px !important;" class="line3" />

                                <!--<h2 style="margin-bottom: 9px ; text-align: center;">REFER A FRIEND</h2>-->
                                <!--<p-->
                                <!--    style="margin-bottom: 10px; font-size:20px; line-height: 26px; color:#000; margin-bottom:4px;text-align: center;">-->
                                <!--    Refer your friends and get £45 off your next booking-->



                                <!--</p>-->
                                <!--<a href={{ env('T_AND_C', 'JavaScript:void(0)') }}>-->
                                <!--    <p-->
                                <!--        style="margin-bottom: 80px; font-size:20px; line-height: 26px; color:#000; margin-bottom:4px; text-decoration:underline; margin-bottom: 80px; text-align: center;">-->
                                <!--        T&C's apply</p>-->
                                <!--</a>-->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @include('email.footer')
        </div>
    </body>

    </html>
@endsection
