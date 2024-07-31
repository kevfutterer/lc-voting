<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laracast Voting</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Open+Sans:400,500,600&display=swap" rel="stylesheet" />
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-gray-background text-gray-900 text-sm">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
            <a href="/">
                <svg width="145" height="31" viewBox="0 0 241.406 48.365" xmlns="http://www.w3.org/2000/svg"><g id="svgGroup" stroke-linecap="round" fill-rule="evenodd" font-size="9pt" stroke="#000" stroke-width="0.25mm" fill="#000" style="stroke:#000;stroke-width:0.25mm;fill:#000"><path d="M 26.196 0.659 L 28.857 0.659 L 15.674 36.353 L 13.184 36.353 L 0 0.659 L 2.637 0.659 L 12.402 27.075 A 109.194 109.194 0 0 1 13.091 29.037 A 99.396 99.396 0 0 1 13.184 29.309 A 125.793 125.793 0 0 1 13.705 30.891 A 110.13 110.13 0 0 1 13.867 31.397 A 41.856 41.856 0 0 1 14.302 32.857 A 36.516 36.516 0 0 1 14.429 33.325 Q 14.673 32.398 14.978 31.433 A 105.666 105.666 0 0 1 15.298 30.438 A 127.489 127.489 0 0 1 15.649 29.382 A 156.997 156.997 0 0 1 16.034 28.256 A 193.981 193.981 0 0 1 16.455 27.051 L 26.196 0.659 Z M 132.178 9.79 L 140.747 9.79 L 140.747 11.548 L 135.278 11.914 A 9.238 9.238 0 0 1 136.856 14.616 A 8.833 8.833 0 0 1 136.89 14.71 A 9.315 9.315 0 0 1 137.427 17.871 A 10.141 10.141 0 0 1 137.077 20.607 A 7.496 7.496 0 0 1 134.937 24.146 A 8.218 8.218 0 0 1 131.461 26.037 Q 130.203 26.385 128.706 26.45 A 16.148 16.148 0 0 1 128.003 26.465 A 12.955 12.955 0 0 1 125.61 26.245 Q 124.121 27.124 123.34 28.015 A 3.129 3.129 0 0 0 122.578 29.821 A 4.134 4.134 0 0 0 122.559 30.225 A 2.303 2.303 0 0 0 122.638 30.846 A 1.753 1.753 0 0 0 123.047 31.58 Q 123.535 32.105 124.463 32.385 A 5.908 5.908 0 0 0 125.285 32.567 Q 125.936 32.666 126.733 32.666 L 131.396 32.666 Q 134.232 32.666 136.195 33.423 A 7.267 7.267 0 0 1 138.013 34.424 Q 140.308 36.182 140.308 39.6 A 8.078 8.078 0 0 1 139.742 42.681 Q 138.992 44.517 137.249 45.808 A 9.472 9.472 0 0 1 136.877 46.069 A 11.889 11.889 0 0 1 133.653 47.545 Q 130.913 48.364 127.148 48.364 A 21.041 21.041 0 0 1 124.239 48.176 Q 122.712 47.962 121.466 47.506 A 9.147 9.147 0 0 1 119.373 46.436 A 6.409 6.409 0 0 1 117.384 44.289 Q 116.699 43.058 116.614 41.494 A 8.307 8.307 0 0 1 116.602 41.04 A 6.825 6.825 0 0 1 118.286 36.414 A 6.75 6.75 0 0 1 121.731 34.305 A 9.033 9.033 0 0 1 122.852 34.082 A 5.201 5.201 0 0 1 121.489 33.172 A 4.742 4.742 0 0 1 120.984 32.617 A 3.405 3.405 0 0 1 120.264 30.469 A 4.237 4.237 0 0 1 121.015 28.066 A 5.214 5.214 0 0 1 121.118 27.918 Q 121.973 26.733 123.682 25.732 A 7.122 7.122 0 0 1 120.068 22.913 A 7.828 7.828 0 0 1 118.885 19.83 A 10.471 10.471 0 0 1 118.75 18.115 A 10.585 10.585 0 0 1 119.002 15.753 A 8.189 8.189 0 0 1 119.897 13.452 A 7.802 7.802 0 0 1 123.157 10.388 Q 125.269 9.302 128.149 9.302 A 27.542 27.542 0 0 1 128.989 9.314 A 20.508 20.508 0 0 1 129.749 9.351 A 13.461 13.461 0 0 1 130.524 9.425 A 10.713 10.713 0 0 1 131.079 9.509 A 8.169 8.169 0 0 1 131.693 9.643 A 6.219 6.219 0 0 1 132.178 9.79 Z M 111.548 18.994 L 111.548 36.353 L 109.106 36.353 L 109.106 19.141 A 13.733 13.733 0 0 0 108.955 17.03 Q 108.787 15.951 108.432 15.09 A 5.501 5.501 0 0 0 107.3 13.33 A 5.788 5.788 0 0 0 104.75 11.83 Q 103.557 11.475 102.051 11.475 Q 98.461 11.475 96.263 13.197 A 7.105 7.105 0 0 0 95.374 14.026 A 7.943 7.943 0 0 0 93.796 16.756 Q 93.066 18.831 93.066 21.729 L 93.066 36.353 L 90.601 36.353 L 90.601 9.815 L 92.603 9.815 L 92.969 14.649 L 93.115 14.649 A 9.432 9.432 0 0 1 95.056 11.951 A 8.627 8.627 0 0 1 97.125 10.466 A 10.557 10.557 0 0 1 98.096 10.022 A 9.811 9.811 0 0 1 100.247 9.45 A 13.509 13.509 0 0 1 102.295 9.302 A 13.628 13.628 0 0 1 104.996 9.553 Q 106.589 9.875 107.816 10.612 A 7.222 7.222 0 0 1 109.155 11.646 A 7.143 7.143 0 0 1 110.853 14.372 Q 111.265 15.514 111.433 16.93 A 17.572 17.572 0 0 1 111.548 18.994 Z M 191.626 31.445 L 191.455 31.445 Q 191.528 32.837 191.577 34.351 A 97.154 97.154 0 0 1 191.614 35.822 A 81.122 81.122 0 0 1 191.626 37.207 L 191.626 48.096 L 189.136 48.096 L 189.136 9.815 L 191.187 9.815 L 191.479 15.112 L 191.626 15.112 A 10.469 10.469 0 0 1 193.052 12.765 A 12.136 12.136 0 0 1 193.481 12.256 Q 194.678 10.913 196.509 10.107 Q 198.222 9.354 200.555 9.305 A 15.579 15.579 0 0 1 200.879 9.302 A 12.212 12.212 0 0 1 204.266 9.746 A 8.968 8.968 0 0 1 208.826 12.744 A 10.999 10.999 0 0 1 210.703 16.231 Q 211.646 19.019 211.646 22.9 A 25.027 25.027 0 0 1 211.432 26.261 Q 211.11 28.633 210.303 30.505 A 11.768 11.768 0 0 1 208.765 33.131 A 9.429 9.429 0 0 1 206.482 35.23 A 9.852 9.852 0 0 1 202.657 36.676 A 13.1 13.1 0 0 1 200.537 36.841 Q 198.271 36.841 196.563 36.195 A 8.204 8.204 0 0 1 196.375 36.121 A 9.005 9.005 0 0 1 194.528 35.117 A 7.589 7.589 0 0 1 193.433 34.168 A 9.129 9.129 0 0 1 191.626 31.445 Z M 221.387 31.445 L 221.216 31.445 Q 221.289 32.837 221.338 34.351 A 97.154 97.154 0 0 1 221.375 35.822 A 81.122 81.122 0 0 1 221.387 37.207 L 221.387 48.096 L 218.896 48.096 L 218.896 9.815 L 220.947 9.815 L 221.24 15.112 L 221.387 15.112 A 10.469 10.469 0 0 1 222.812 12.765 A 12.136 12.136 0 0 1 223.242 12.256 Q 224.438 10.913 226.27 10.107 Q 227.983 9.354 230.315 9.305 A 15.579 15.579 0 0 1 230.64 9.302 A 12.212 12.212 0 0 1 234.027 9.746 A 8.968 8.968 0 0 1 238.586 12.744 A 10.999 10.999 0 0 1 240.464 16.231 Q 241.406 19.019 241.406 22.9 A 25.027 25.027 0 0 1 241.193 26.261 Q 240.871 28.633 240.063 30.505 A 11.768 11.768 0 0 1 238.526 33.131 A 9.429 9.429 0 0 1 236.243 35.23 A 9.852 9.852 0 0 1 232.417 36.676 A 13.1 13.1 0 0 1 230.298 36.841 Q 228.031 36.841 226.324 36.195 A 8.204 8.204 0 0 1 226.135 36.121 A 9.005 9.005 0 0 1 224.289 35.117 A 7.589 7.589 0 0 1 223.193 34.168 A 9.129 9.129 0 0 1 221.387 31.445 Z M 184.692 36.353 L 182.056 36.353 L 177.197 23.731 L 162.207 23.731 L 157.251 36.353 L 154.688 36.353 L 168.726 0.537 L 171.021 0.537 L 184.692 36.353 Z M 73.633 34.107 L 73.633 36.157 Q 72.852 36.426 71.802 36.633 Q 70.752 36.841 69.482 36.841 Q 67.236 36.841 65.747 35.999 A 5.147 5.147 0 0 1 63.728 33.902 A 6.533 6.533 0 0 1 63.501 33.435 A 8.015 8.015 0 0 1 63.011 31.882 Q 62.744 30.633 62.744 29.053 L 62.744 11.865 L 58.789 11.865 L 58.789 10.4 L 62.72 9.644 L 63.574 3.394 L 65.21 3.394 L 65.21 9.815 L 73.486 9.815 L 73.486 11.865 L 65.21 11.865 L 65.21 28.906 Q 65.21 31.763 66.272 33.24 A 3.343 3.343 0 0 0 68.069 34.491 Q 68.807 34.717 69.751 34.717 A 13.59 13.59 0 0 0 71.091 34.653 A 11.114 11.114 0 0 0 71.887 34.546 A 12.757 12.757 0 0 0 72.763 34.364 Q 73.172 34.264 73.531 34.142 A 7.785 7.785 0 0 0 73.633 34.107 Z M 55.047 26.247 A 21.699 21.699 0 0 0 55.273 23.047 A 21.979 21.979 0 0 0 55.043 19.797 A 16.39 16.39 0 0 0 53.979 15.894 A 12.825 12.825 0 0 0 53.715 15.301 A 10.484 10.484 0 0 0 50.11 11.047 Q 48.57 10.004 46.573 9.584 A 14.076 14.076 0 0 0 43.677 9.302 A 14.64 14.64 0 0 0 41.129 9.515 A 10.89 10.89 0 0 0 37.268 10.95 A 10.154 10.154 0 0 0 35.234 12.597 A 11.332 11.332 0 0 0 33.167 15.686 Q 32.358 17.435 32.007 19.565 A 21.433 21.433 0 0 0 31.738 23.047 A 22.133 22.133 0 0 0 31.857 25.382 A 17.311 17.311 0 0 0 32.52 28.674 Q 33.301 31.201 34.802 33.032 Q 36.304 34.863 38.477 35.852 A 10.601 10.601 0 0 0 40.802 36.594 A 13.43 13.43 0 0 0 43.433 36.841 A 14.759 14.759 0 0 0 45.776 36.663 A 10.96 10.96 0 0 0 48.572 35.84 A 10.028 10.028 0 0 0 52.271 33.008 A 11.43 11.43 0 0 0 53.36 31.405 A 13.443 13.443 0 0 0 54.517 28.65 A 17.213 17.213 0 0 0 55.047 26.247 Z M 34.277 23.047 A 20.694 20.694 0 0 0 34.469 25.934 Q 34.692 27.517 35.176 28.873 A 12.697 12.697 0 0 0 35.278 29.15 A 9.59 9.59 0 0 0 36.586 31.539 A 8.107 8.107 0 0 0 38.318 33.228 A 7.542 7.542 0 0 0 41.122 34.451 Q 42.178 34.685 43.402 34.692 A 13.251 13.251 0 0 0 43.481 34.692 A 11.449 11.449 0 0 0 45.762 34.478 Q 47.192 34.187 48.314 33.503 A 6.882 6.882 0 0 0 48.73 33.228 A 8.209 8.209 0 0 0 51.335 30.111 A 10.4 10.4 0 0 0 51.758 29.126 A 15.21 15.21 0 0 0 52.534 26.001 A 20.765 20.765 0 0 0 52.734 23.047 A 20.6 20.6 0 0 0 52.51 19.932 A 15.466 15.466 0 0 0 51.807 17.09 A 9.378 9.378 0 0 0 50.524 14.636 A 8.027 8.027 0 0 0 48.877 12.976 Q 47.014 11.579 44.095 11.482 A 13.3 13.3 0 0 0 43.652 11.475 Q 39.038 11.475 36.658 14.551 A 10.469 10.469 0 0 0 34.93 18.015 Q 34.486 19.507 34.344 21.295 A 22.143 22.143 0 0 0 34.277 23.047 Z M 191.626 22.705 L 191.626 23.12 A 25.814 25.814 0 0 0 191.76 25.835 Q 191.986 27.963 192.59 29.578 A 9.132 9.132 0 0 0 193.578 31.518 A 6.833 6.833 0 0 0 195.496 33.423 Q 197.411 34.676 200.242 34.692 A 13.006 13.006 0 0 0 200.317 34.692 A 9.564 9.564 0 0 0 202.608 34.431 A 7.233 7.233 0 0 0 205.103 33.301 A 7.919 7.919 0 0 0 207.308 30.869 A 10.617 10.617 0 0 0 208.081 29.273 A 14.043 14.043 0 0 0 208.808 26.603 Q 209.032 25.328 209.088 23.869 A 25.954 25.954 0 0 0 209.106 22.876 Q 209.106 17.285 206.97 14.38 Q 204.834 11.475 200.562 11.475 Q 197.559 11.475 195.569 12.781 A 7.378 7.378 0 0 0 193.086 15.552 A 9.506 9.506 0 0 0 192.615 16.589 Q 191.803 18.696 191.657 21.59 A 25.627 25.627 0 0 0 191.626 22.705 Z M 221.387 22.705 L 221.387 23.12 A 25.814 25.814 0 0 0 221.521 25.835 Q 221.746 27.963 222.351 29.578 A 9.132 9.132 0 0 0 223.339 31.518 A 6.833 6.833 0 0 0 225.256 33.423 Q 227.172 34.676 230.002 34.692 A 13.006 13.006 0 0 0 230.078 34.692 A 9.564 9.564 0 0 0 232.369 34.431 A 7.233 7.233 0 0 0 234.863 33.301 A 7.919 7.919 0 0 0 237.069 30.869 A 10.617 10.617 0 0 0 237.842 29.273 A 14.043 14.043 0 0 0 238.569 26.603 Q 238.793 25.328 238.849 23.869 A 25.954 25.954 0 0 0 238.867 22.876 Q 238.867 17.285 236.731 14.38 Q 234.595 11.475 230.322 11.475 Q 227.319 11.475 225.33 12.781 A 7.378 7.378 0 0 0 222.846 15.552 A 9.506 9.506 0 0 0 222.375 16.589 Q 221.564 18.696 221.418 21.59 A 25.627 25.627 0 0 0 221.387 22.705 Z M 79.297 9.815 L 81.763 9.815 L 81.763 36.353 L 79.297 36.353 L 79.297 9.815 Z M 163.062 21.46 L 176.392 21.46 L 171.46 8.081 Q 171.285 7.623 171.042 6.929 A 87.436 87.436 0 0 1 170.984 6.763 A 174.79 174.79 0 0 1 170.697 5.933 A 206.514 206.514 0 0 1 170.398 5.054 Q 170.093 4.15 169.8 3.345 Q 169.556 4.199 169.263 5.054 A 455.13 455.13 0 0 0 168.837 6.301 A 406.467 406.467 0 0 0 168.701 6.702 A 43.721 43.721 0 0 1 168.439 7.456 A 32.006 32.006 0 0 1 168.188 8.13 L 163.062 21.46 Z M 130.859 35.156 L 126.416 35.156 A 13.433 13.433 0 0 0 124.438 35.295 A 10.054 10.054 0 0 0 122.632 35.73 A 5.888 5.888 0 0 0 121.208 36.436 A 4.785 4.785 0 0 0 120.056 37.549 A 4.4 4.4 0 0 0 119.37 39.002 Q 119.2 39.618 119.156 40.348 A 8.71 8.71 0 0 0 119.141 40.869 A 5.365 5.365 0 0 0 119.422 42.651 A 4.417 4.417 0 0 0 121.228 44.91 A 7.083 7.083 0 0 0 123.063 45.75 Q 123.967 46.028 125.071 46.163 A 18.628 18.628 0 0 0 127.319 46.289 A 26.647 26.647 0 0 0 129.763 46.184 Q 130.954 46.074 131.969 45.849 A 12.667 12.667 0 0 0 133.142 45.532 A 9.459 9.459 0 0 0 134.728 44.863 Q 135.913 44.222 136.646 43.298 A 5.361 5.361 0 0 0 137.744 40.695 A 7.185 7.185 0 0 0 137.817 39.649 Q 137.817 38.353 137.366 37.484 A 2.986 2.986 0 0 0 136.963 36.89 Q 136.108 35.913 134.546 35.535 Q 133.203 35.21 131.446 35.164 A 22.543 22.543 0 0 0 130.859 35.156 Z M 132.043 23.63 A 5.304 5.304 0 0 0 133.154 22.827 Q 134.778 21.294 134.902 18.489 A 10.694 10.694 0 0 0 134.912 18.018 Q 134.912 14.649 133.105 12.964 Q 131.299 11.279 128.052 11.279 A 8.905 8.905 0 0 0 126.005 11.501 A 5.925 5.925 0 0 0 123.108 13.074 A 5.871 5.871 0 0 0 121.587 15.8 Q 121.348 16.716 121.318 17.802 A 11.375 11.375 0 0 0 121.313 18.115 Q 121.313 20.707 122.566 22.305 A 5.194 5.194 0 0 0 123.022 22.815 A 5.395 5.395 0 0 0 125.146 24.069 Q 125.98 24.344 126.991 24.438 A 11.959 11.959 0 0 0 128.101 24.487 Q 130.469 24.487 132.043 23.63 Z M 81.086 0.051 A 2.477 2.477 0 0 0 80.566 0 A 2.809 2.809 0 0 0 80.557 0 Q 80.274 0.001 80.037 0.059 A 1.407 1.407 0 0 0 79.248 0.549 Q 78.963 0.906 78.863 1.421 A 3.175 3.175 0 0 0 78.809 2.026 Q 78.809 2.954 79.248 3.491 A 1.359 1.359 0 0 0 79.432 3.677 Q 79.688 3.889 80.048 3.973 A 2.282 2.282 0 0 0 80.566 4.028 Q 81.494 4.028 81.934 3.491 A 1.685 1.685 0 0 0 82.11 3.227 Q 82.256 2.959 82.321 2.618 A 3.166 3.166 0 0 0 82.373 2.026 A 3.68 3.68 0 0 0 82.368 1.84 Q 82.328 1.042 81.934 0.549 A 1.317 1.317 0 0 0 81.643 0.281 Q 81.406 0.12 81.086 0.051 Z" vector-effect="non-scaling-stroke"/></g></svg>            
            </a>
            <div class="flex items-center mt-2 md:mt-0">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                            <div class="flex items-center space-x-4">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{route('logout')}}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>   
                                <div 
                                    x-data="{isOpen: false}"
                                    class="relative">
                                    <button 
                                        @click="isOpen = !isOpen">
                                        <svg  viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-gray-400">
                                            <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z" clip-rule="evenodd" />
                                        </svg>
                                        <div class="absolute rounded-full bg-red text-white text-xs w-4 h-4 flex justify-center items-center border-2 -top-1 -right-1 ">
                                        </div>
                                    </button>
                                    <ul 
                                        x-cloak
                                        x-show.transition.origin.top = "isOpen"
                                        @click.away = "isOpen = false"
                                        @keydown.excape.window="isOpen = false"
                                        class=" text-left absolute w-76 md:w-96 text-gray-700 bg-white shadow-dialog rounded-xlmd:ml-8 max-h-128 overflow-y-auto z-10 -right-28 md:-right-12"
                                        >
                                        <li>
                                            <a 
                                                href="" 
                                                @click.prevent = "
                                                    isOpen = false
                                                    "
                                                class="flex hover:bg-gray-100 text-sm px-5 py-3 transition duration-150 ease-in">
                                                <img src="https://image.tmdb.org/t/p/w235_and_h235_face/p17ymzw1sb9eo2SOp88jnwyryan.jpg" alt="avatar"
                                                class="w-10 h-10 rounded-full">
                                                <div class="ml-4">
                                                    <div class="line-clamp-6">
                                                        <span class="font-semibold">name</span>
                                                        commented on <span class="font-semibold">This is my idea</span>:
                                                        <span>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sapiente possimus asperiores cum impedit corporis nulla, minima officia veritatis ullam! Provident possimus aperiam eius praesentium maxime, accusantium alias atque reiciendis.'</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a 
                                                href="" 
                                                @click.prevent = "
                                                    isOpen = false
                                                    "
                                                class="flex hover:bg-gray-100 text-sm px-5 py-3 transition duration-150 ease-in">
                                                <img src="https://image.tmdb.org/t/p/w235_and_h235_face/p17ymzw1sb9eo2SOp88jnwyryan.jpg" alt="avatar"
                                                class="w-10 h-10 rounded-full">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">name</span>
                                                        commented on <span class="font-semibold">This is my idea</span>:
                                                        <span>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sapiente possimus asperiores cum impedit corporis nulla, minima officia veritatis ullam! Provident possimus aperiam eius praesentium maxime, accusantium alias atque reiciendis.'</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a 
                                                href="" 
                                                @click.prevent = "
                                                    isOpen = false
                                                    "
                                                class="flex hover:bg-gray-100 text-sm px-5 py-3 transition duration-150 ease-in">
                                                <img src="https://image.tmdb.org/t/p/w235_and_h235_face/p17ymzw1sb9eo2SOp88jnwyryan.jpg" alt="avatar"
                                                class="w-10 h-10 rounded-full">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">name</span>
                                                        commented on <span class="font-semibold">This is my idea</span>:
                                                        <span>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sapiente possimus asperiores cum impedit corporis nulla, minima officia veritatis ullam! Provident possimus aperiam eius praesentium maxime, accusantium alias atque reiciendis.'</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a 
                                                href="" 
                                                @click.prevent = "
                                                    isOpen = false
                                                    "
                                                class="flex hover:bg-gray-100 text-sm px-5 py-3 transition duration-150 ease-in">
                                                <img src="https://image.tmdb.org/t/p/w235_and_h235_face/p17ymzw1sb9eo2SOp88jnwyryan.jpg" alt="avatar"
                                                class="w-10 h-10 rounded-full">
                                                <div class="ml-4">
                                                    <div>
                                                        <span class="font-semibold">name</span>
                                                        commented on <span class="font-semibold">This is my idea</span>:
                                                        <span>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sapiente possimus asperiores cum impedit corporis nulla, minima officia veritatis ullam! Provident possimus aperiam eius praesentium maxime, accusantium alias atque reiciendis.'</span>
                                                    </div>
                                                    <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="border-t border-gray-300 text-center">
                                            <button
                                                class="block w-full font-semibold hover:bg-gray-100 text-sm px-5 py-3 transition duration-150 ease-in">
                                                Mark all as red
                                            </button>
                                        </li>
                                    </ul>
                                </div>                     
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a href="">
                    <img src="https://image.tmdb.org/t/p/w235_and_h235_face/p17ymzw1sb9eo2SOp88jnwyryan.jpg" alt="avatar"
                    class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>

        <main class="container mx-auto max-w-custom flex flex-col md:flex-row" >
            <div class="w-70 md:mx-0 mx-auto md:mr-5" >
                <div class="border md:sticky md:top-8 bg-white border-blue rounded-xl mt-16">
                    <div class="text-center px-6 py-2 pt-6">
                        <h3 class="font-semibold text-base">Add an idea</h3>
                        <a href="" class="text-xs mt-8">
                            @auth 
                                Let us know what you would like and we'll take a look over
                            @else
                                Please login to create an idea
                            @endauth
                        </a>
                    </div>
                    @auth
                        <livewire:create-idea />
                    @else
                        <div class="my-6 text-center">
                            <a href="{{ route('login')}}" type="submit"
                                class="inline-block justify-center w-1/2 h-11 text-xs bg-blue font-semibold rounded-full border text-white border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3" >
                                Login
                            </a>
                            <a href="{{ route('register')}}" type="button"
                                class="inline-block justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-full border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-4" >
                                Sign Up
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="w-full px-2 md:px-0 md:w-175">
                <livewire:status-filers />
                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>
            
        </main>
        @livewireScripts
    </body>
</html>
