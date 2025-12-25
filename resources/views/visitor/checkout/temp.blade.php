<x-visitor-layout>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Progress Steps -->
            <div class="mb-8">
                <div class="flex justify-center space-x-4 mb-4">
                    <div class="checkout-step completed flex flex-col items-center">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mb-2">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium">Cart</span>
                    </div>
                    
                    <div class="w-16 h-1 bg-green-500 mt-5"></div>
                    
                    <div class="checkout-step active flex flex-col items-center">
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mb-2">
                            <span class="text-white font-bold">2</span>
                        </div>
                        <span class="text-sm font-medium">Information</span>
                    </div>
                    
                    <div class="w-16 h-1 bg-gray-300 mt-5"></div>
                    
                    <div class="checkout-step flex flex-col items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center mb-2">
                            <span class="text-gray-600 font-bold">3</span>
                        </div>
                        <span class="text-sm font-medium text-gray-500">Shipping</span>
                    </div>
                    
                    <div class="w-16 h-1 bg-gray-300 mt-5"></div>
                    
                    <div class="checkout-step flex flex-col items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center mb-2">
                            <span class="text-gray-600 font-bold">4</span>
                        </div>
                        <span class="text-sm font-medium text-gray-500">Payment</span>
                    </div>
                </div>
            </div>
            
            <form id="checkout-form" method="POST" action="{{ route('checkout.store') }}">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column: Form -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Contact Information -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Contact Information
                            </h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                    <input type="text" id="first_name" name="first_name" required 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                    <input type="text" id="last_name" name="last_name" required 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                
                                <div class="md:col-span-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                    <input type="email" id="email" name="email" required 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                
                                <div class="md:col-span-2">
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                                    <input type="tel" id="phone" name="phone" required 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Shipping Address -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-xl font-bold text-gray-900 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Shipping Address
                                </h2>
                                <label class="flex items-center">
                                    <input type="checkbox" id="same_as_billing" class="mr-2 rounded border-gray-300">
                                    <span class="text-sm text-gray-600">Same as billing address</span>
                                </label>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-2">
                                    <label for="shipping_address" class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                                    <input type="text" id="shipping_address" name="shipping[address]" required 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                
                                <div>
                                    <label for="shipping_city" class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                                    <input type="text" id="shipping_city" name="shipping[city]" required 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                
                                <div>
                                    <label for="shipping_state" class="block text-sm font-medium text-gray-700 mb-2">State *</label>
                                    <select id="shipping_state" name="shipping[state]" required 
                                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="">Select State</option>
                                        @foreach($states as $code => $name)
                                        <option value="{{ $code }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="shipping_zip" class="block text-sm font-medium text-gray-700 mb-2">ZIP Code *</label>
                                    <input type="text" id="shipping_zip" name="shipping[zip]" required 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                
                                <div>
                                    <label for="shipping_country" class="block text-sm font-medium text-gray-700 mb-2">Country *</label>
                                    <select id="shipping_country" name="shipping[country]" required 
                                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <!-- Add more countries as needed -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Billing Address (Hidden initially) -->
                        <div id="billing-address-section" class="bg-white rounded-2xl shadow-lg p-6 hidden">
                            <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Billing Address
                            </h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-2">
                                    <label for="billing_address" class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                                    <input type="text" id="billing_address" name="billing[address]" 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                
                                <div>
                                    <label for="billing_city" class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                                    <input type="text" id="billing_city" name="billing[city]" 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                
                                <div>
                                    <label for="billing_state" class="block text-sm font-medium text-gray-700 mb-2">State *</label>
                                    <select id="billing_state" name="billing[state]" 
                                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="">Select State</option>
                                        @foreach($states as $code => $name)
                                        <option value="{{ $code }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="billing_zip" class="block text-sm font-medium text-gray-700 mb-2">ZIP Code *</label>
                                    <input type="text" id="billing_zip" name="billing[zip]" 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                
                                <div>
                                    <label for="billing_country" class="block text-sm font-medium text-gray-700 mb-2">Country *</label>
                                    <select id="billing_country" name="billing[country]" 
                                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Payment Information -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                Payment Information
                            </h2>
                            
                            <!-- Card Preview -->
                            <div class="payment-card mb-6">
                                <div class="flex justify-between items-start mb-8">
                                    <div class="chip"></div>
                                    <div class="text-right">
                                        <div class="text-sm opacity-80">Chase</div>
                                        <div class="text-lg font-bold">VISA</div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="text-lg font-mono tracking-wider card-number" id="card-preview">**** **** **** ****</div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <div class="text-sm opacity-80">CARD HOLDER</div>
                                        <div class="font-medium" id="card-holder-preview">YOUR NAME</div>
                                    </div>
                                    <div>
                                        <div class="text-sm opacity-80">EXPIRES</div>
                                        <div class="font-medium" id="card-expiry-preview">MM/YY</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Payment Form -->
                            <div class="space-y-4">
                                <div>
                                    <label for="card_holder" class="block text-sm font-medium text-gray-700 mb-2">Cardholder Name *</label>
                                    <input type="text" id="card_holder" name="card_holder" required 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           oninput="updateCardHolder(this.value)">
                                </div>
                                
                                <div>
                                    <label for="card_number" class="block text-sm font-medium text-gray-700 mb-2">Card Number *</label>
                                    <input type="text" id="card_number" name="card_number" required 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 card-number"
                                           maxlength="19"
                                           placeholder="1234 5678 9012 3456"
                                           oninput="formatCardNumber(this)">
                                </div>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="expiry_date" class="block text-sm font-medium text-gray-700 mb-2">Expiry Date *</label>
                                        <input type="text" id="expiry_date" name="expiry_date" required 
                                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                               placeholder="MM/YY"
                                               maxlength="5"
                                               oninput="formatExpiryDate(this)">
                                    </div>
                                    
                                    <div>
                                        <label for="cvc" class="block text-sm font-medium text-gray-700 mb-2">CVC *</label>
                                        <input type="text" id="cvc" name="cvc" required 
                                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                               maxlength="4"
                                               placeholder="123">
                                    </div>
                                </div>
                                
                                <!-- Save card option -->
                                <div class="flex items-center">
                                    <input type="checkbox" id="save_card" name="save_card" class="mr-2 rounded border-gray-300">
                                    <label for="save_card" class="text-sm text-gray-600">Save card for future purchases</label>
                                </div>
                            </div>
                            
                            <!-- Security Notice -->
                            <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    <span class="text-sm text-blue-700">Your payment is secured with 256-bit SSL encryption</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Column: Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="sticky top-8">
                            <!-- Order Summary -->
                            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mb-6">
                                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6">
                                    <h2 class="text-xl font-bold text-white">Order Summary</h2>
                                </div>
                                
                                <div class="p-6">
                                    <!-- Order Items -->
                                    <div class="space-y-4 mb-6">
                                        @foreach($cart->items as $item)
                                        <div class="flex items-center justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center">
                                                    <div class="w-12 h-12 bg-gradient-to-br from-gray-100 to-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                        <span class="text-lg">🛒</span>
                                                    </div>
                                                    <div>
                                                        <p class="font-medium text-gray-900">{{ $item->product->name }}</p>
                                                        <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-semibold text-gray-900">${{ number_format($item->price * $item->quantity, 2) }}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    
                                    <!-- Price Breakdown -->
                                    <div class="space-y-3 border-t border-gray-200 pt-6">
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Subtotal</span>
                                            <span class="font-semibold text-gray-900">${{ number_format($subtotal, 2) }}</span>
                                        </div>
                                        
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Shipping</span>
                                            <span class="font-semibold text-green-600">FREE</span>
                                        </div>
                                        
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Tax</span>
                                            <span class="font-semibold text-gray-900">${{ number_format($tax, 2) }}</span>
                                        </div>
                                        
                                        <!-- Promo Code -->
                                        <div class="pt-4">
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-gray-600">Promo Code</span>
                                                <button type="button" onclick="togglePromoCode()" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                                    Add Code
                                                </button>
                                            </div>
                                            <div id="promo-code-input" class="hidden">
                                                <div class="flex space-x-2">
                                                    <input type="text" placeholder="Enter promo code" class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                                    <button type="button" class="bg-gray-200 text-gray-700 px-3 py-2 rounded-lg text-sm hover:bg-gray-300">Apply</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Total -->
                                        <div class="border-t border-gray-200 pt-4">
                                            <div class="flex justify-between items-center">
                                                <span class="text-lg font-bold text-gray-900">Total</span>
                                                <div class="text-right">
                                                    <p class="text-3xl font-bold text-gray-900">${{ number_format($total, 2) }}</p>
                                                    <p class="text-gray-500 text-sm">USD</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Terms & Conditions -->
                                    <div class="mt-6">
                                        <div class="flex items-center">
                                            <input type="checkbox" id="terms" name="terms" required class="mr-2 rounded border-gray-300">
                                            <label for="terms" class="text-sm text-gray-600">
                                                I agree to the <a href="/terms" class="text-blue-600 hover:underline">Terms of Service</a> and <a href="/privacy" class="text-blue-600 hover:underline">Privacy Policy</a>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <!-- Complete Order Button -->
                                    <button type="submit" id="submit-order" 
                                            class="w-full bg-gradient-to-r from-green-500 to-emerald-500 text-white font-semibold py-4 px-6 rounded-xl hover:from-green-600 hover:to-emerald-600 transition-all duration-200 mt-6 flex items-center justify-center space-x-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        <span>Complete Order - ${{ number_format($total, 2) }}</span>
                                    </button>
                                    
                                    <!-- Payment Methods -->
                                    <div class="mt-6 pt-6 border-t border-gray-100">
                                        <p class="text-sm text-gray-600 mb-3 text-center">We Accept</p>
                                        <div class="flex justify-center space-x-4">
                                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/visa/visa-original.svg" class="h-8" alt="Visa">
                                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mastercard/mastercard-original.svg" class="h-8" alt="Mastercard">
                                            <img src="https://www.svgrepo.com/show/328121/american-express.svg" class="h-8" alt="American Express">
                                            <img src="https://cdn.worldvectorlogo.com/logos/discover-2.svg" class="h-8" alt="Discover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Security & Support -->
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6">
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        <span class="text-sm text-gray-700">Secure 256-bit SSL encryption</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                        <span class="text-sm text-gray-700">PCI DSS compliant</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm text-gray-700">30-day money-back guarantee</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Hidden inputs for payment processing -->
                <input type="hidden" id="payment_token" name="payment_token">
                <input type="hidden" id="payment_method" name="payment_method" value="chase">
            </form>
        </div>
    </div>
    
    @php
        $jsStates = json_encode($states);
    @endphp
    
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script>
        const states = {!! $jsStates !!};

        // Initialize Cleave.js for formatting
        document.addEventListener('DOMContentLoaded', function() {
            // Card number formatting
            new Cleave('#card_number', {
                creditCard: true,
                onCreditCardTypeChanged: function(type) {
                    // Update card type in preview
                    const cardTypeElement = document.querySelector('.payment-card .text-lg.font-bold');
                    if (cardTypeElement) {
                        cardTypeElement.textContent = type.toUpperCase();
                    }
                }
            });
            
            // Expiry date formatting
            new Cleave('#expiry_date', {
                date: true,
                datePattern: ['m', 'y']
            });
            
            // CVC formatting
            new Cleave('#cvc', {
                blocks: [4],
                numericOnly: true
            });
            
            // Phone number formatting
            new Cleave('#phone', {
                phone: true,
                phoneRegionCode: 'US'
            });
            
            // ZIP code formatting
            new Cleave('#shipping_zip', {
                blocks: [5],
                numericOnly: true
            });
            
            new Cleave('#billing_zip', {
                blocks: [5],
                numericOnly: true
            });
        });
        
        // Update card preview
        function updateCardHolder(name) {
            document.getElementById('card-holder-preview').textContent = name.toUpperCase() || 'YOUR NAME';
        }
        
        function formatCardNumber(input) {
            let value = input.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
            let formatted = value.replace(/(\d{4})/g, '$1 ').trim();
            input.value = formatted.substring(0, 19);
            
            // Update preview with masked numbers
            const preview = formatted.replace(/\d(?=\d{4})/g, '*');
            document.getElementById('card-preview').textContent = preview.padEnd(19, '*');
            
            // Show last 4 digits
            if (value.length >= 4) {
                const last4 = value.slice(-4);
                document.getElementById('card-preview').innerHTML = 
                    `**** **** **** <span class="opacity-100">${last4}</span>`;
            }
        }
        
        function formatExpiryDate(input) {
            let value = input.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.slice(0, 2) + '/' + value.slice(2, 4);
            }
            input.value = value;
            document.getElementById('card-expiry-preview').textContent = value || 'MM/YY';
        }
        
        // Toggle billing address
        document.getElementById('same_as_billing').addEventListener('change', function(e) {
            const billingSection = document.getElementById('billing-address-section');
            if (e.target.checked) {
                billingSection.classList.add('hidden');
                // Copy shipping to billing
                copyShippingToBilling();
            } else {
                billingSection.classList.remove('hidden');
            }
        });
        
        document.getElementById('checkout-form').addEventListener('submit', function(e) {
            const sameAsBilling = document.getElementById('same_as_billing').checked;
            if (sameAsBilling) {
                copyShippingToBilling();
            }
        });
        
        function copyShippingToBilling() {
            const shippingAddress = document.getElementById('shipping_address').value;
            const shippingCity = document.getElementById('shipping_city').value;
            const shippingState = document.getElementById('shipping_state').value;
            const shippingZip = document.getElementById('shipping_zip').value;
            const shippingCountry = document.getElementById('shipping_country').value;
            
            document.getElementById('billing_address').value = shippingAddress;
            document.getElementById('billing_city').value = shippingCity;
            document.getElementById('billing_state').value = shippingState;
            document.getElementById('billing_zip').value = shippingZip;
            document.getElementById('billing_country').value = shippingCountry;
        }
        
        // Toggle promo code
        function togglePromoCode() {
            const promoInput = document.getElementById('promo-code-input');
            promoInput.classList.toggle('hidden');
        }
        
        // Form submission with Chase integration
        document.getElementById('checkout-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Validate form
            if (!validateForm()) {
                return;
            }
            
            // Disable submit button and show loading
            const submitBtn = document.getElementById('submit-order');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = `
                <div class="loader"></div>
                <span class="ml-2">Processing Payment...</span>
            `;
            submitBtn.disabled = true;
            
            try {
                // Step 1: Create payment token with Chase
                const cardData = {
                    card_number: document.getElementById('card_number').value.replace(/\s+/g, ''),
                    exp_month: document.getElementById('expiry_date').value.split('/')[0],
                    exp_year: '20' + document.getElementById('expiry_date').value.split('/')[1],
                    cvc: document.getElementById('cvc').value
                };
                
                // In real app, make AJAX call to create token
                 const tokenResponse = await fetch('https://api.chasepaymentech.com/tokenize', {
                     method: 'POST',
                     headers: { 'Content-Type': 'application/json' },
                     body: JSON.stringify(cardData)
                 });
                const tokenData = await tokenResponse.json();
                
                // Simulate token creation
                const tokenData = { token: 'tok_' + Math.random().toString(36).substr(2, 10) };
                
                // Set payment token
                document.getElementById('payment_token').value = tokenData.token;
                
                // Step 2: Submit form with token
                this.submit();
                
            } catch (error) {
                console.error('Payment error:', error);
                alert('Payment processing failed. Please try again.');
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });
        
        function validateForm() {
            let isValid = true;
            
            // Required fields
            const requiredFields = [
                'first_name', 'last_name', 'email', 'phone',
                'shipping_address', 'shipping_city', 'shipping_state', 'shipping_zip',
                'card_holder', 'card_number', 'expiry_date', 'cvc'
            ];
            
            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field.value.trim()) {
                    field.classList.add('input-error');
                    isValid = false;
                    
                    // Add error message
                    if (!field.nextElementSibling || !field.nextElementSibling.classList.contains('error-message')) {
                        const error = document.createElement('div');
                        error.className = 'error-message';
                        error.textContent = 'This field is required';
                        field.parentNode.appendChild(error);
                    }
                } else {
                    field.classList.remove('input-error');
                    
                    // Remove error message
                    if (field.nextElementSibling && field.nextElementSibling.classList.contains('error-message')) {
                        field.nextElementSibling.remove();
                    }
                }
            });
            
            // Email validation
            const email = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email.value && !emailRegex.test(email.value)) {
                email.classList.add('input-error');
                isValid = false;
            }
            
            // Terms agreement
            const terms = document.getElementById('terms');
            if (!terms.checked) {
                alert('Please agree to the Terms of Service and Privacy Policy');
                isValid = false;
            }
            
            return isValid;
        }
    </script>
    @endpush
</x-visitor-layout>