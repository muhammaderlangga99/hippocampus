<footer class="@if (Request::is('/')) bg-gradient-to-t from-indigo-200 to-indigo-100 @endif">
    <div class="mx-auto pt-40 w-full max-w-screen-xl">
        <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Company</h2>
                <ul class="text-gray-500 font-medium">
                    <li class="mb-4">
                        <a href="/about" class=" hover:underline">About</a>
                    </li>
                    <li class="mb-4">
                        <a href="https://www.instagram.com/hippocampusindonesia/" class="hover:underline">Community</a>
                    </li>
                    <li class="mb-4">
                        <a href="https://hippocampus-idn.com" class="hover:underline">Brand Center</a>
                    </li>
                    <li class="mb-4">
                        <a href="/product" class="hover:underline">Product</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Help center</h2>
                <ul class="text-gray-500 font-medium">
                    <li class="mb-4">
                        <a href="https://api.whatsapp.com/send?phone=628111776569&text=Saya%20tertarik%20untuk%20order%20wetsuit%20customnya."
                            class="hover:underline">Whatsapp</a>
                    </li>
                    <li class="mb-4">
                        <a href="https://www.instagram.com/hippocampusindonesia/" class="hover:underline">Instagram</a>
                    </li>
                    <li class="mb-4">
                        <a href="https://www.tokopedia.com/hippocampus?source=universe&st=product"
                            class="hover:underline">Tokopedia</a>
                    </li>
                    <li class="mb-4">
                        <a href="/contact" class="hover:underline">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Legal</h2>
                <ul class="text-gray-500 font-medium">
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Privacy Policy</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Licensing</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Menu</h2>
                <ul class="text-gray-500 font-medium">
                    <li class="mb-4">
                        <a href="/" class="hover:underline">Home</a>
                    </li>
                    <li class="mb-4">
                        <a href="/about" class="hover:underline">About</a>
                    </li>
                    <li class="mb-4">
                        <a href="/product" class="hover:underline">Product</a>
                    </li>
                    <li class="mb-4">
                        <a href="/contact" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="px-4 py-6 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center">© 2023 <a
                    href="https://muhammaderlangga99.github.io/">Muhammad Erlangga with hyperintegrated </a>. All
                Rights Reserved.
            </span>
            <div class="flex mt-4 space-x-6 sm:justify-center md:mt-0">
                <a href="https://www.instagram.com/hippocampusindonesia/" class="text-gray-400 hover:text-gray-900">
                    <i class="bi bi-instagram"></i>
                    <span class="sr-only">Instagram page</span>
                </a>
                <a href="https://api.whatsapp.com/send?phone=628111776569&text=Saya%20tertarik%20untuk%20order%20wetsuit%20customnya."
                    class="text-gray-400 hover:text-gray-900">
                    <i class="bi bi-whatsapp"></i>
                    <span class="sr-only">GitHub account</span>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-900">
                    <img src="{{ asset('img/tokopedia.png') }}" alt="" class="w-5">
                    <span class="sr-only">Dribbble account</span>
                </a>
            </div>
        </div>
    </div>
</footer>
