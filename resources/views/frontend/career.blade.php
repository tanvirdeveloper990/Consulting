@extends('layouts.app')
@section('title','Career')
@section('content')

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-primary to-secondary py-20 md:py-32 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="1" fill="white" />
                    <line x1="20" y1="0" x2="20" y2="40" stroke="white" stroke-width="0.5" />
                    <line x1="0" y1="20" x2="40" y2="20" stroke="white" stroke-width="0.5" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)" />
        </svg>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                {{ \App\Helpers\TranslateHelper::translate($overview->join_our_team_title) }}
            </h1>
            <p class="text-lg md:text-xl mb-8 text-white/90">
                {{ \App\Helpers\TranslateHelper::translate($overview->join_our_team_description) }}
            </p>
            <a href="#apply-form" class="inline-block bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                {{ \App\Helpers\TranslateHelper::translate('Apply Now') }}
            </a>
        </div>
    </div>
</section>

<!-- Application Form Section -->
<section id="apply-form" class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    {{ \App\Helpers\TranslateHelper::translate($overview->join_our_team_title) }}
                </h2>
                <p class="text-gray-600">
                    {{ \App\Helpers\TranslateHelper::translate($overview->join_our_team_description) }}
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="grid lg:grid-cols-2">
                    <!-- Form Side -->
                    <div class="p-8 md:p-12">
                        <form action="{{ route('team') }}" id="apply-form" class="space-y-6" enctype="multipart/form-data">
                            @csrf

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label for="fname" class="block text-sm font-medium text-gray-700 mb-2">
                                        {{ \App\Helpers\TranslateHelper::translate('First Name') }} <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        id="fname"
                                        name="fname"
                                        required
                                        value="{{ old('fname') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition duration-200"
                                        placeholder="{{ \App\Helpers\TranslateHelper::translate('Enter first name') }}">
                                </div>
                                <div>
                                    <label for="lname" class="block text-sm font-medium text-gray-700 mb-2">
                                        {{ \App\Helpers\TranslateHelper::translate('Last Name') }} <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        id="lname"
                                        name="lname"
                                        required
                                        value="{{ old('lname') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition duration-200"
                                        placeholder="{{ \App\Helpers\TranslateHelper::translate('Enter last name') }}">
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ \App\Helpers\TranslateHelper::translate('Email Address') }} <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    required
                                    value="{{ old('email') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition duration-200"
                                    placeholder="example@email.com">
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ \App\Helpers\TranslateHelper::translate('Phone Number') }} <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    required
                                    value="{{ old('phone') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition duration-200"
                                    placeholder="+880 1XXX-XXXXXX">
                            </div>

                            <div>
                                <label for="position" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ \App\Helpers\TranslateHelper::translate('Position Applied For') }} <span class="text-red-500">*</span>
                                </label>
                                <select
                                    id="position"
                                    name="position"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition duration-200">
                                    <option value="">{{ \App\Helpers\TranslateHelper::translate('Select a position') }}</option>
                                    <option value="Education Counselor">{{ \App\Helpers\TranslateHelper::translate('Education Counselor') }}</option>
                                    <option value="Visa Processing Officer">{{ \App\Helpers\TranslateHelper::translate('Visa Processing Officer') }}</option>
                                    <option value="Marketing Executive">{{ \App\Helpers\TranslateHelper::translate('Marketing Executive') }}</option>
                                    <option value="Office Administrator">{{ \App\Helpers\TranslateHelper::translate('Office Administrator') }}</option>
                                    <option value="Other">{{ \App\Helpers\TranslateHelper::translate('Other') }}</option>
                                </select>
                            </div>

                            <div>
                                <label for="years_of_experience" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ \App\Helpers\TranslateHelper::translate('Years of Experience') }} <span class="text-red-500">*</span>
                                </label>
                                <select
                                    id="years_of_experience"
                                    name="years_of_experience"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition duration-200">
                                    <option value="">{{ \App\Helpers\TranslateHelper::translate('Select experience') }}</option>
                                    <option value="0-1">{{ \App\Helpers\TranslateHelper::translate('0-1 years (Fresher)') }}</option>
                                    <option value="1-3">{{ \App\Helpers\TranslateHelper::translate('1-3 years') }}</option>
                                    <option value="3-5">{{ \App\Helpers\TranslateHelper::translate('3-5 years') }}</option>
                                    <option value="5+">{{ \App\Helpers\TranslateHelper::translate('5+ years') }}</option>
                                </select>
                            </div>

                            <div>
                                <label for="expected_salary" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ \App\Helpers\TranslateHelper::translate('Expected Salary (BDT)') }}
                                </label>
                                <input
                                    type="text"
                                    id="expected_salary"
                                    name="expected_salary"
                                    value="{{ old('expected_salary') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition duration-200"
                                    placeholder="{{ \App\Helpers\TranslateHelper::translate('e.g., 30,000') }}">
                            </div>

                            <div>
                                <label for="want_to_join_us" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ \App\Helpers\TranslateHelper::translate('Why do you want to join us?') }}
                                </label>
                                <textarea
                                    id="want_to_join_us"
                                    name="want_to_join_us"
                                    rows="4"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition duration-200 resize-none"
                                    placeholder="{{ \App\Helpers\TranslateHelper::translate('Tell us about yourself...') }}">{{ old('want_to_join_us') }}</textarea>
                            </div>

                            <div>
                                <label for="file" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ \App\Helpers\TranslateHelper::translate('Upload Resume') }} <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="file"
                                    id="file"
                                    name="file"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-red-600 file:text-white file:cursor-pointer hover:file:bg-red-700">
                                <p class="text-xs text-gray-500 mt-2">{{ \App\Helpers\TranslateHelper::translate('PDF, DOC, DOCX (Max 5MB)') }}</p>
                            </div>

                            <button
                                type="submit"
                                class="w-full bg-primary text-white py-4 rounded-lg font-semibold text-lg hover:bg-primary/90 transition duration-300 shadow-lg hover:shadow-xl">
                                {{ \App\Helpers\TranslateHelper::translate('APPLY NOW') }}
                            </button>
                        </form>
                    </div>

                    <!-- Pattern Side -->
                    <div class="hidden lg:block bg-gradient-to-br from-primary to-secondary relative overflow-hidden">
                        <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <pattern id="network-pattern" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse">
                                    <circle cx="10" cy="10" r="2" fill="white" opacity="0.3" />
                                    <circle cx="50" cy="10" r="2" fill="white" opacity="0.3" />
                                    <circle cx="90" cy="10" r="2" fill="white" opacity="0.3" />
                                    <circle cx="30" cy="40" r="2" fill="white" opacity="0.3" />
                                    <circle cx="70" cy="40" r="2" fill="white" opacity="0.3" />
                                    <circle cx="10" cy="70" r="2" fill="white" opacity="0.3" />
                                    <circle cx="50" cy="70" r="2" fill="white" opacity="0.3" />
                                    <circle cx="90" cy="70" r="2" fill="white" opacity="0.3" />
                                    <line x1="10" y1="10" x2="30" y2="40" stroke="white" stroke-width="1" opacity="0.2" />
                                    <line x1="50" y1="10" x2="30" y2="40" stroke="white" stroke-width="1" opacity="0.2" />
                                    <line x1="50" y1="10" x2="70" y2="40" stroke="white" stroke-width="1" opacity="0.2" />
                                    <line x1="90" y1="10" x2="70" y2="40" stroke="white" stroke-width="1" opacity="0.2" />
                                    <line x1="30" y1="40" x2="50" y2="70" stroke="white" stroke-width="1" opacity="0.2" />
                                    <line x1="70" y1="40" x2="50" y2="70" stroke="white" stroke-width="1" opacity="0.2" />
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" fill="url(#network-pattern)" />
                        </svg>

                        <div class="relative z-10 h-full flex flex-col items-center justify-center p-12 text-white">
                            <svg class="w-24 h-24 mx-auto mb-6 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <h3 class="text-3xl font-bold mb-4">
                                {{ \App\Helpers\TranslateHelper::translate($career->title) }}
                            </h3>
                            <p class="text-white/90 text-lg mb-8 text-center">
                                {{ \App\Helpers\TranslateHelper::translate($career->description) }}
                            </p>

                            <div class="grid grid-cols-2 gap-6 mb-8 w-full max-w-sm">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                                    <div class="text-3xl font-bold mb-1">{{$career->box_one_count}}+</div>
                                    <div class="text-sm text-white/80">
                                        {{ \App\Helpers\TranslateHelper::translate($career->box_one_title) }}
                                    </div>
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                                    <div class="text-3xl font-bold mb-1">{{$career->box_two_count}}%</div>
                                    <div class="text-sm text-white/80">
                                        {{ \App\Helpers\TranslateHelper::translate($career->box_two_title) }}
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4 text-left w-full max-w-sm flex flex-col items-center justify-center">
                                <div class="flex items-start gap-3">
                                    <svg class="w-6 h-6 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <div>
                                        <div class="font-semibold mb-1">
                                            {{ \App\Helpers\TranslateHelper::translate($career->list1_tile) }}
                                        </div>
                                        <div class="text-sm text-white/80">
                                            {{ \App\Helpers\TranslateHelper::translate($career->list1_subtitle) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-6 h-6 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <div>
                                        <div class="font-semibold mb-1">
                                            {{ \App\Helpers\TranslateHelper::translate($career->list2_tile) }}
                                        </div>
                                        <div class="text-sm text-white/80">
                                            {{ \App\Helpers\TranslateHelper::translate($career->list2_subtitle) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-6 h-6 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <div>
                                        <div class="font-semibold mb-1">
                                            {{ \App\Helpers\TranslateHelper::translate($career->list3_tile) }}
                                        </div>
                                        <div class="text-sm text-white/80">
                                            {{ \App\Helpers\TranslateHelper::translate($career->list3_subtitle) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection