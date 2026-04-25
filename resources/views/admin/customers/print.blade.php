<?php
$svg = QrCode::size(200)->generate($url);
$qr = base64_encode($svg);
?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Health Certificate Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <script>
        tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#7BBC46",
              textColour: "#1F5458",
            },
          },
        },
      };
    </script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap");

        body {
            font-family: "Cairo", sans-serif;
        }

        /* PRINT VERSION FIX */
        @media print {
            body {
                width: 800px !important;
                margin: 0 auto !important;
                zoom: 0.85 !important;
                /* text & layout balanced */
                background: #fff !important;
            }

            .max-w-5xl,
            .container,
            .w-full {
                max-width: 800px !important;
            }

            /* LOGO FIX */
            .logo-box {
                width: 100px !important;
                height: 100px !important;
                padding: 2px !important;
            }

            .logo-box img {
                width: 100% !important;
                height: auto !important;
                object-fit: contain !important;
            }

            img {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }


            /* Remove default browser margins */
            @page {
                size: portrait;
                margin: 0;
            }
        }
    </style>
    <script>
        // Auto Print on Page Load
        window.onload = function () {
            window.print();
        }
    </script>
</head>

<body class="py-3 max-w-5xl mx-auto" style="background-color:#f2f4f3">
    <!-- Header Card -->
    <div class="max-w-2xl mx-auto">
        <!-- Green Header Section -->
        <div class="flex items-center justify-between">
            <!-- Left Side: Three Logos -->
            <div class="flex items-center gap-1 flex-1 pr-2">
                <!-- Logo 1 -->
                <div class="w-24 h-24 bg-white rounded flex items-center justify-center overflow-hidden logo-box">
                    <img src="{{ Storage::url($setting->image1) }}" alt="" />
                </div>

                <!-- Logo 2 -->
                <div class="w-24 h-24 bg-white rounded flex items-center justify-center overflow-hidden logo-box">
                    <img src="{{ Storage::url($setting->image2) }}" alt="" />
                </div>

                <!-- Logo 3 -->
                <div class="w-24 h-24 bg-white rounded flex items-center justify-center overflow-hidden logo-box">
                    <img src="{{ Storage::url($setting->image3) }}" alt="" />
                </div>

            </div>

            <!-- Right Side: Text Content -->
            <div class="text-white text-left bg-primary" style="padding-right: 25px;">
                <h1 class="text-2xl font-bold py-8 pl-2">{{ $setting->card_title }}</h1>
            </div>
        </div>
        
        <!-- Card Content Section -->
        <div class="py-6">
            <div class="w-full flex flex-row gap-6">
                <!--Right Side: User Information -->
                <div class="w-full flex flex-col justify-between">
                    <!-- Name in Arabic -->
                    <div class="text-right mb-4">
                        <div class="text-lg md:text-4xl font-bold text-textColour">
                            {{ $item->name }}
                        </div>
                    </div>
    
                    <div class="grid grid-cols-2 gap-4 md:gap-6">
                        <!-- ID Number -->
                        <div class="text-right">
                            <div class="text-base text-gray-500 mb-1 font-bold">
                                رقم الهوية
                            </div>
                            <div class="bg-white p-1.5 text-lg md:text-xl font-bold text-gray-800">
                                {{ $item->id_number }}
                            </div>
                        </div>
    
                        <!-- Occupation -->
                        <div class="text-right">
                            <div class="text-base text-gray-500 mb-1 font-bold">الجنسية </div>
                            <div class="bg-white p-1.5 text-base md:text-lg font-bold text-gray-800">
                                {{ $item->nationality }}
                            </div>
                        </div>
                        <!-- Occupation -->
                        <div class="text-right">
                            <div class="text-base text-gray-500 mb-1 font-bold">رقم البطاقة الصحية</div>
                            <div class="bg-white p-1.5 text-base md:text-lg font-bold text-gray-800">
                                {{ $item->health_certificate_number }}
                            </div>
                        </div>
    
                        <!-- Certificate Number -->
                        <div class="text-right">
                            <div class="text-base text-gray-500 mb-1 font-bold">
                                المهنة
                            </div>
                            <div class="bg-white p-1.5 text-base md:text-lg font-bold text-gray-800">
                                {{ $item->profession }}
                            </div>
                        </div>
    
                        <!-- Issue Date -->
                        <div class="text-right">
                            <div class="text-base text-gray-500 mb-1 font-bold">
                                تاريخ نهاية الشهادة الصحية
                            </div>
                            <div class="bg-white p-1.5 text-base md:text-lg font-bold text-gray-800">
                                {{ $item->health_certificate_expiry_date_hijri_calendar }}
                            </div>
                        </div>
    
                        <!-- Expiry Date -->
                        <div class="text-right">
                            <div class="text-base text-gray-500 mb-1 font-bold">
                                تاريخ إصدار الشهادة الصحية
                            </div>
                            <div class="bg-white p-1.5 text-base md:text-lg font-bold text-gray-800">
                                {{ $item->date_of_issuance_of_the_health_certificate_hijri_calendar }}
                            </div>
                        </div>
                    </div>
                </div>
    
                <!--  Left Side: Photo and QR Code -->
                <div class="w-1/4 flex flex-col items-center gap-6 md:w-40 flex-shrink-0">
                    <!-- User Photo -->
                    <div
                        class="w-32 h-32 md:w-36 md:h-36 border-4 border-gray-300 bg-gray-100 flex items-center justify-center overflow-hidden">
                        <img src="{{ Storage::url($item->image) }}" alt="">
                    </div>
    
                    <!-- QR Code -->
                    <div
                        class="w-32 h-32 md:w-36 md:h-36 border-2 border-gray-300 bg-white flex items-center justify-center p-2">
                        <img src="data:image/svg+xml;base64,{{ $qr }}" class="w-full h-full object-contain" />
                    </div>
    
    
    
                </div>
            </div>
        </div>
        
        
        <!-- Footer Section with Contact Info -->
    <div class="container mx-auto px-0 py-3 border-b-2 border-textColour rounded-b-lg mb-2">
        <div class="flex items-center gap-2">
            {{-- <div class="flex items-center gap-0 flex-wrap justify-between footer-line"> --}}
                <!-- Website -->
                <a href="https://www.balady.gov.sa" target="_blank" class="flex items-center gap-1 py-2">
                    <span class="text-textColour font-bold text-sm">{{ $setting->card_footer_website }}</span>
                    <i class="fas fa-globe text-primary border-2 border-[#CCDAC5] p-1 rounded-full"></i>
                </a>

                <!-- Twitter saudimomra -->
                <a href="https://twitter.com/saudimomra" target="_blank" class="flex items-center gap-1 py-2">
                    <span class="text-textColour font-bold text-sm">{{ $setting->card_footer_name }}</span>
                    <i class="fab fa-twitter text-primary border-2 border-[#CCDAC5] p-1 rounded-full"></i>
                    <i class="fab fa-facebook text-primary border-2 border-[#CCDAC5] p-1 rounded-full"></i>
                    <i class="fab fa-youtube text-primary border-2 border-[#CCDAC5] p-1 rounded-full"></i>
                </a>

                <!-- Twitter Balady_cs -->
                <a href="https://twitter.com/Balady_cs" target="_blank" class="flex items-center gap-1 py-2">
                    <span class="text-gray-700 font-bold text-sm">{{ $setting->card_footer_company }}</span>
                    <i class="fab fa-twitter text-primary border-2 border-[#CCDAC5] p-1 rounded-full"></i>
                </a>
                <div class="flex items-center gap-1 py-2">
                    <span class="text-gray-600 text-sm">{{ $setting->card_footer_title }}</span>
                    <span class="text-gray-500 font-bold text-2xl">{{ $setting->card_cell_number }}</span>
                    <div class="bg-primary rounded-full p-2 w-8 h-8 flex items-center justify-center">
                        <i class="fab fa-whatsapp text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-primary px-2" style="padding-top:2px;padding-bottom:15px;">
            <div class="">
                <!-- Header Section -->
                
                <div class="flex items-center justify-start mb-8">
                    <div class="flex items-center gap-2">
                        <img style="width:25%;" class="" src="{{ Storage::url($setting->image5) }}" alt="" />
                        <img style="width:60%;" class="" src="{{ Storage::url($setting->image4) }}" alt="" />
                       
                    </div>
                </div>
                
                <!--<div class="flex items-center justify-start mb-8">-->
                <!--    <div class="flex items-center gap-2">-->
                <!--        <img class="w-16 h-16 rounded-full" src="{{ Storage::url($setting->image4) }}" alt="" />-->
                        <!-- Title -->
                <!--        {{-- <span>-->
                <!--            <h1 class="text-white text-3xl md:text-4xl font-bold">-->
                <!--                تعليمات وإرشادات-->
                <!--            </h1>-->
                <!--        </span> --}}-->
                <!--    </div>-->
                <!--    <div class="flex items-center gap-2 relative">-->
                <!--        <div class="bg-white w-14 h-14 rounded-full absolute mr-3"></div>-->
                <!--        <img class="w-20 h-20 rounded-full z-10" src="{{ Storage::url($setting->image5) }}" alt="" />-->
                        <!-- Title -->
                <!--        {{-- <span>-->
                <!--            <h1 class="text-white text-3xl md:text-4xl font-bold">-->
                <!--                تعليمات وإرشادات-->
                <!--            </h1>-->
                <!--        </span> --}}-->
                <!--    </div>-->
                <!--</div>-->

                <!-- Instructions List -->
                <div class="space-y-6 px-6" style="width:90%;">
                    <!-- Instruction 1 -->
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 mt-1">
                            <i class="fas fa-cog text-white text-2xl"></i>
                        </div>
                        <p class="text-white text-lg md:text-xl leading-relaxed">
                            {{ $setting->card_list1 }}
                        </p>
                    </div>

                    <!-- Instruction 2 -->
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 mt-1">
                            <i class="fas fa-cog text-white text-2xl"></i>
                        </div>
                        <p class="text-white text-lg md:text-xl leading-relaxed">
                            {{ $setting->card_list2 }}
                        </p>
                    </div>

                    <!-- Instruction 3 -->
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 mt-1">
                            <i class="fas fa-cog text-white text-2xl"></i>
                        </div>
                        <p class="text-white text-lg md:text-xl leading-relaxed">
                            {{ $setting->card_list3 }}
                        </p>
                    </div>

                    <!-- Instruction 4 -->
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 mt-1">
                            <i class="fas fa-cog text-white text-2xl"></i>
                        </div>
                        <p class="text-white text-lg md:text-xl leading-relaxed">
                            {{ $setting->card_list4 }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    

    
</body>

</html>