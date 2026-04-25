@extends('layouts.app')
@section('title','Excellent | Terms & Condition')

@section('content')

<main class="max-w-7xl mx-auto">
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-sky-500 to-sky-700 py-16 rounded-b-3xl  px-4">
        <div class="container mx-auto max-w-5xl">
            <div class="text-center">
                <!-- Icon -->
                <div
                    class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full mb-6">
                    <i class="fas fa-file-contract text-4xl text-white"></i>
                </div>

                <!-- Title -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4">
                    Terms & Conditions
                </h1>

                <!-- Divider -->
                <div class="w-24 h-1 bg-white/40 mx-auto mb-6 rounded-full"></div>

                <!-- Description -->
                <p class="text-lg md:text-xl text-white/90 max-w-3xl mx-auto leading-relaxed mb-6">
                    Please read these terms carefully before using our services. By using our platform, you agree to
                    these terms and conditions.
                </p>

                <!-- Last Updated Badge -->
                <div
                    class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white px-5 py-2 rounded-full border border-white/20">
                    <i class="far fa-calendar-alt text-sm"></i>
                    <span class="text-sm font-medium">Last Updated: December 20, 2025</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 md:py-16 px-4">
        <div class="container mx-auto max-w-5xl">

            <!-- Introduction -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-info-circle text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">1. Introduction</h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    Welcome to [Your Company Name] ("we," "our," or "us"). These Terms and Conditions ("Terms")
                    govern your access to and use of our website, mobile application, and services (collectively,
                    the "Service"). By accessing or using our Service, you agree to be bound by these Terms. If you
                    do not agree with any part of these Terms, you must not use our Service.
                </p>
            </div>

            <!-- Acceptance of Terms -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-handshake text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">2. Acceptance of Terms</h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        By creating an account, accessing, browsing, or using our Service, you acknowledge that you
                        have read, understood, and agree to be bound by these Terms and our Privacy Policy. Your
                        continued use of the Service constitutes your ongoing acceptance of these Terms and any
                        modifications we may make from time to time.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        These Terms constitute a legally binding agreement between you and [Your Company Name]. If
                        you are using the Service on behalf of an organization, you represent and warrant that you
                        have the authority to bind that organization to these Terms.
                    </p>
                </div>
            </div>

            <!-- Eligibility -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-user-check text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">3. Eligibility to Use</h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        You must be at least 18 years of age or the age of legal majority in your jurisdiction to
                        use our Service. By using the Service, you represent and warrant that you meet this age
                        requirement and have the legal capacity to enter into these Terms.
                    </p>
                    <div class="bg-[#E1F5FF] border-l-4 border-[#0EA5E9] rounded-r-lg p-4">
                        <p class="text-gray-700 text-sm">
                            <i class="fas fa-exclamation-circle text-[#0EA5E9] mr-2"></i>
                            If you are under the age of 18 but at least 13 years old, you may use the Service only
                            with the involvement and consent of a parent or legal guardian. Users under 13 years of
                            age are not permitted to use the Service under any circumstances.
                        </p>
                    </div>
                </div>
            </div>

            <!-- User Accounts -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-user-circle text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">4. User Accounts</h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        To access certain features of our Service, you may be required to create an account. When
                        creating an account, you must provide accurate, complete, and current information. You are
                        responsible for maintaining the confidentiality of your account credentials and for all
                        activities that occur under your account.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        You agree to immediately notify us of any unauthorized use of your account or any other
                        breach of security. We will not be liable for any loss or damage arising from your failure
                        to protect your account information.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        You may not transfer, sell, or share your account with any other person without our express
                        written permission. We reserve the right to suspend or terminate accounts that violate these
                        Terms or appear to be fraudulent or abusive.
                    </p>
                </div>
            </div>

            <!-- Use of Service -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-laptop text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">5. Use of Website/Application
                        </h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        We grant you a limited, non-exclusive, non-transferable, and revocable license to access and
                        use our Service for your personal or internal business purposes in accordance with these
                        Terms. This license does not include any right to resell or commercial use of the Service,
                        or any derivative use of the Service or its contents.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        You agree to use the Service only for lawful purposes and in accordance with these Terms.
                        You must not use the Service in any way that could damage, disable, overburden, or impair
                        our servers or networks, or interfere with any other party's use and enjoyment of the
                        Service.
                    </p>
                </div>
            </div>

            <!-- User Responsibilities -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-tasks text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">6. User Responsibilities</h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        As a user of our Service, you are responsible for your conduct and any content you submit,
                        post, or transmit through the Service. You agree to comply with all applicable laws,
                        regulations, and these Terms when using the Service.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        You are solely responsible for the accuracy, quality, integrity, and legality of the
                        information you provide. You must ensure that your use of the Service does not violate any
                        third-party rights, including intellectual property rights, privacy rights, or contractual
                        rights.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        You agree to maintain accurate and up-to-date information in your account and to promptly
                        update any information that changes. You are responsible for maintaining adequate security
                        and control of your account credentials and should not share them with unauthorized
                        individuals.
                    </p>
                </div>
            </div>

            <!-- Prohibited Activities -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-ban text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">7. Prohibited Activities</h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <p class="text-gray-700 leading-relaxed mb-4">You agree not to engage in any of the following
                    prohibited activities:</p>
                <div class="grid md:grid-cols-2 gap-3">
                    <div class="flex items-start gap-3 bg-red-50 rounded-lg p-3">
                        <i class="fas fa-times-circle text-red-500 mt-1 flex-shrink-0"></i>
                        <span class="text-gray-700 text-sm">Violating any applicable laws or regulations</span>
                    </div>
                    <div class="flex items-start gap-3 bg-red-50 rounded-lg p-3">
                        <i class="fas fa-times-circle text-red-500 mt-1 flex-shrink-0"></i>
                        <span class="text-gray-700 text-sm">Uploading viruses or malicious code</span>
                    </div>
                    <div class="flex items-start gap-3 bg-red-50 rounded-lg p-3">
                        <i class="fas fa-times-circle text-red-500 mt-1 flex-shrink-0"></i>
                        <span class="text-gray-700 text-sm">Unauthorized access to systems</span>
                    </div>
                    <div class="flex items-start gap-3 bg-red-50 rounded-lg p-3">
                        <i class="fas fa-times-circle text-red-500 mt-1 flex-shrink-0"></i>
                        <span class="text-gray-700 text-sm">Interfering with Service operations</span>
                    </div>
                    <div class="flex items-start gap-3 bg-red-50 rounded-lg p-3">
                        <i class="fas fa-times-circle text-red-500 mt-1 flex-shrink-0"></i>
                        <span class="text-gray-700 text-sm">Impersonating others</span>
                    </div>
                    <div class="flex items-start gap-3 bg-red-50 rounded-lg p-3">
                        <i class="fas fa-times-circle text-red-500 mt-1 flex-shrink-0"></i>
                        <span class="text-gray-700 text-sm">Harvesting user information</span>
                    </div>
                    <div class="flex items-start gap-3 bg-red-50 rounded-lg p-3">
                        <i class="fas fa-times-circle text-red-500 mt-1 flex-shrink-0"></i>
                        <span class="text-gray-700 text-sm">Fraudulent or illegal activities</span>
                    </div>
                    <div class="flex items-start gap-3 bg-red-50 rounded-lg p-3">
                        <i class="fas fa-times-circle text-red-500 mt-1 flex-shrink-0"></i>
                        <span class="text-gray-700 text-sm">Reverse engineering the Service</span>
                    </div>
                </div>
            </div>

            <!-- Intellectual Property -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-copyright text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">8. Intellectual Property
                            Rights</h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        All content, features, and functionality of the Service, including but not limited to text,
                        graphics, logos, icons, images, audio clips, video clips, data compilations, and software,
                        are the exclusive property of [Your Company Name] or its licensors and are protected by
                        international copyright, trademark, patent, trade secret, and other intellectual property
                        laws.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        You may not reproduce, distribute, modify, create derivative works of, publicly display,
                        publicly perform, republish, download, store, or transmit any material from our Service
                        without our prior written consent, except as permitted by these Terms or as expressly
                        authorized by applicable law.
                    </p>
                    <div class="bg-[#E1F5FF] rounded-xl p-4">
                        <p class="text-gray-700 text-sm">
                            <i class="fas fa-lightbulb text-[#0EA5E9] mr-2"></i>
                            Any content you submit to the Service remains your property. However, by submitting
                            content, you grant us a worldwide, non-exclusive, royalty-free, perpetual, and
                            transferable license to use, reproduce, modify, adapt, publish, translate, distribute,
                            and display such content.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Third-Party Links -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-external-link-alt text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">9. Third-Party Links</h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        Our Service may contain links to third-party websites, applications, or services that are
                        not owned or controlled by [Your Company Name]. We have no control over and assume no
                        responsibility for the content, privacy policies, or practices of any third-party sites or
                        services.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        We strongly advise you to review the terms and conditions and privacy policies of any
                        third-party sites or services that you visit. Your interactions with third-party sites are
                        solely between you and the third party, and we shall not be liable for any loss or damage
                        arising from such interactions.
                    </p>
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">10. Disclaimer of Warranties
                        </h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-5 space-y-3">
                    <p class="text-gray-700 leading-relaxed font-semibold">
                        THE SERVICE IS PROVIDED ON AN "AS IS" AND "AS AVAILABLE" BASIS WITHOUT WARRANTIES OF ANY
                        KIND, EITHER EXPRESS OR IMPLIED.
                    </p>
                    <p class="text-gray-700 leading-relaxed text-sm">
                        We do not warrant that the Service will be uninterrupted, timely, secure, or error-free. We
                        do not warrant that the results obtained from the use of the Service will be accurate or
                        reliable. We do not warrant that any errors in the Service will be corrected.
                    </p>
                    <p class="text-gray-700 leading-relaxed text-sm">
                        You acknowledge that your use of the Service is at your own risk. We make no guarantees
                        regarding the availability, quality, or performance of the Service.
                    </p>
                </div>
            </div>

            <!-- Limitation of Liability -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-balance-scale text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">11. Limitation of Liability
                        </h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="bg-red-50 border-l-4 border-red-500 rounded-r-lg p-4">
                        <p class="text-gray-700 leading-relaxed text-sm font-semibold">
                            TO THE MAXIMUM EXTENT PERMITTED BY LAW, [YOUR COMPANY NAME] SHALL NOT BE LIABLE FOR ANY
                            INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR PUNITIVE DAMAGES.
                        </p>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        Our total liability to you for any claims arising out of or related to these Terms or the
                        Service shall not exceed the amount you paid us, if any, during the twelve (12) months prior
                        to the event giving rise to the liability, or one hundred dollars ($100), whichever is
                        greater.
                    </p>
                </div>
            </div>

            <!-- Termination -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-power-off text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">12. Termination of Access</h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        We reserve the right to suspend or terminate your access to the Service at any time, with or
                        without cause, with or without notice, and without liability to you. Reasons for termination
                        may include, but are not limited to, violation of these Terms, fraudulent or illegal
                        activity, or conduct that we determine to be harmful to other users or to our business
                        interests.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Upon termination, your right to use the Service will immediately cease. All provisions of
                        these Terms that by their nature should survive termination shall survive, including but not
                        limited to ownership provisions, warranty disclaimers, indemnity obligations, and
                        limitations of liability.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        You may terminate your account at any time by contacting us or using the account deletion
                        feature within the Service. Upon termination by either party, we may delete your account
                        information and content in accordance with our data retention policies.
                    </p>
                </div>
            </div>

            <!-- Changes to Terms -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-sync-alt text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">13. Changes to Terms</h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        We reserve the right to modify or replace these Terms at any time at our sole discretion. We
                        will provide notice of material changes by posting the updated Terms on this page and
                        updating the "Last Updated" date at the top of this document. We may also notify you via
                        email or through a notification on the Service.
                    </p>
                    <div class="bg-[#E1F5FF] border-l-4 border-[#0EA5E9] rounded-r-lg p-4">
                        <p class="text-gray-700 leading-relaxed text-sm">
                            <i class="fas fa-bell text-[#0EA5E9] mr-2"></i>
                            Your continued use of the Service after any changes to these Terms constitutes your
                            acceptance of the new Terms. If you do not agree to the modified Terms, you must stop
                            using the Service immediately.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Governing Law -->
            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-8 card-hover border border-gray-100">
                <div class="flex items-start gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#E1F5FF] to-white flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-gavel text-xl text-[#0EA5E9]"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">14. Governing Law</h2>
                        <div class="w-16 h-1 bg-[#0EA5E9] rounded-full"></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        These Terms shall be governed by and construed in accordance with the laws of [Your
                        Country/State], without regard to its conflict of law provisions. Any disputes arising from
                        or relating to these Terms or the Service shall be resolved in the courts located in [Your
                        Jurisdiction].
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        You agree to submit to the personal jurisdiction of such courts and waive any objection to
                        the jurisdiction or venue of such courts. If any provision of these Terms is found to be
                        invalid or unenforceable, the remaining provisions shall continue in full force and effect.
                    </p>
                </div>
            </div>
    </section>


</main>


@endsection