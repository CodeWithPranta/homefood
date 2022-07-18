<!-- Top Notification Bar -->
@if (session('status'))
<a class="block pt-16 pb-6 bg-blue-900 opacity-100 md:h-16 md:pt-0 md:pb-0">
    <span class="relative flex items-center justify-center h-full max-w-6xl pl-10 pr-20 mx-auto leading-tight text-left md:text-center">
      <span class="text-white">{{ __("".session('status')) }}</span>
    </span>
</a>
@endif
  
<!-- Section 1 - Header -->
<section class="relative w-full bg-top bg-cover md:bg-center" x-data="{ showMenu: false }" style="background-image:url('/taxi/bg.jpeg')">
    
    

    <div class="absolute inset-0 w-full h-full bg-gray-900 opacity-25"></div>
    <div class="absolute inset-0 w-full h-64 opacity-50 bg-gradient-to-b from-black to-transparent"></div>
    <div class="relative flex items-center justify-between w-full h-20 px-8">

        <a href="#" class="relative flex items-center h-full pr-6 text-2xl font-extrabold text-white @if (isset($_GET['mobileapp'])) {{ 'mt-9'}} @endif">{{ strtolower(config('global.site_name','FindMeTaxi')) }}<span class="text-green-400">.</span></a>
        @include('taxilanding.partials.nav')

        <!-- Mobile Nav  -->
        @if (!isset($_GET['mobileapp']))
            <nav class="fixed top-0 right-0 z-30 z-50 flex w-10 h-10 mt-4 mr-4 md:hidden">
                <button @click="showMenu = !showMenu" class="flex items-center justify-center w-10 h-10 rounded-full hover:bg-white hover:bg-opacity-25 focus:outline-none">
                    <svg class="w-5 h-5 text-gray-200 fill-current" x-show="!showMenu" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path></svg>
                    <svg class="w-5 h-5 text-gray-500" x-show="showMenu" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </nav>
            <!-- End Mobile Nav -->   
        @endif
           
    </div>
    <div class="relative z-10 max-w-6xl px-10  py-20 lg:py-60  mx-auto">
        <div class="flex flex-col items-center h-full lg:flex-row">
            @if(!isset($_GET['mobileapp']))
                <div class="flex flex-col items-center justify-center w-full h-full lg:w-2/3 lg:items-start">
                    <h1 class="opacity-90 bg-green-600 p-10 font-extrabold tracking-tight text-center text-white text-7xl lg:text-left xl:pr-32">{{ __('taxi.slogan') }}</h1>
                </div>
            @endif
            
            <div class="w-full max-w-sm mt-20 lg:mt-0 lg:w-1/3">
                <div class="relative">
                    <div class="relative z-10 h-auto p-8 pt-6 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                        <form action="{{ route('cockpit.findtaxi') }}">
                        <h3 class="mb-6 text-2xl font-light">{{ __('taxi.form_title')}}</h3>
                        <div class="relative block mb-4">
                            <span id="search_location" class="absolute inset-y-0 right-2 flex items-center pl-2 opacity-40">
                                    <svg  fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4"><path d="M10.5 13.5L.5 11 21 3l-8 20.5-2.5-10z"></path></svg>
                            </span>
                            <input type="text" name="start" id="txtstartlocation" class="block w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm focus:border-green-500 focus:outline-none" placeholder="{{ __('taxi.form_input_start')}}">
                        </div>
                        <div class="block mb-4">
                            <input type="text" name="end" id="txtendlocation" class="block w-full px-4 py-3 border border-gray-200 rounded shadow-sm focus:border-green-500 focus:outline-none" placeholder="{{ __('taxi.form_input_end')}}">
                        </div>
                        <div class="block mb-4">
                            <input type="phone" name="phone" class="block  min-w-full w-full px-4 py-3 border border-gray-200 rounded shadow-sm focus:border-green-500 focus:outline-none" placeholder="{{ __('taxi.form_input_phone')}}">
                        </div>
                        
                        <div class="block">
                            <button disabled id="submit" class="w-full px-3 py-3 font-medium text-white bg-green-400">{{ __('taxi.form_request')}}</button>
                        </div>
                        <?php if(config('settings.is_demo')): ?>
                        

                            <div class="row mt-5 bg-gray-100 p-6 pt-6 rounded-md ">
                                
                                <div class="bg-gray-100"> <span class="description "><strong>Demo info - test rides</strong>
                                <div>
                                    <span>🚖</span><a  class="ml-3 mt-2 underline" href="/findtaxi?start=Brooklyn,NY,USA&end=Queens,New York,NY,USA&phone=+38977777777">Brooklyn to Queens</a><br />
                                    <span>🚕</span><a  class="ml-3 mt-2 underline" href="/findtaxi?start=Bronx,NY,USA&end=Manhattan,New York,NY,USA&phone=+38977777777">Bronx to Manhattn</a><br />
                                    <span>🚖</span><a  class="ml-3 mt-2 underline" href="/findtaxi?start=Queens,NY,USA&end=Manhattan,Brooklyn,NY,USA&phone=+38977777777">Queens to Brooklyn</a>
                                </div>
                            </div>
                           
                        <?php endif; ?>
                </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</section>
