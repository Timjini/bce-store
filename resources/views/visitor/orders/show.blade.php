<x-visitor-layout>
    @push('styles')
    <style>
        .order-status-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.875rem;
        }
        
        .status-paid {
            background-color: #10B981;
            color: white;
        }
        
        .status-processing {
            background-color: #3B82F6;
            color: white;
        }
        
        .status-shipped {
            background-color: #8B5CF6;
            color: white;
        }
        
        .status-delivered {
            background-color: #059669;
            color: white;
        }
        
        .status-cancelled {
            background-color: #EF4444;
            color: white;
        }
        
        .timeline {
            position: relative;
            padding-left: 30px;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 12px;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: #E5E7EB;
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 24px;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -30px;
            top: 4px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background-color: #9CA3AF;
            border: 2px solid white;
            z-index: 1;
        }
        
        .timeline-item.completed::before {
            background-color: #10B981;
        }
        
        .timeline-item.active::before {
            background-color: #3B82F6;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
            }
        }
        
        .invoice-line {
            border-bottom: 1px dashed #E5E7EB;
            padding-bottom: 12px;
            margin-bottom: 12px;
        }
        
        .tracking-number {
            font-family: 'Courier New', monospace;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
        }
    </style>
    @endpush
    
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Success Header -->
            @if(session('success'))
            <div class="bg-gradient-to-r from-green-500 to-emerald-500 text-white rounded-2xl p-6 mb-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <div>
                            <h1 class="text-2xl font-bold">Order Confirmed!</h1>
                            <p class="opacity-90">{{ session('success') }}</p>
                        </div>
                    </div>
                    <span class="text-2xl font-bold">#{{ $order->id }}</span>
                </div>
            </div>
            @endif
            
            <!-- Order Header -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Order #{{ $order->id }}</h1>
                        <p class="text-gray-600">Placed on {{ $order->created_at->format('F d, Y \a\t h:i A') }}</p>
                    </div>
                    
                    <div class="mt-4 md:mt-0">
                        <span class="order-status-badge status-{{ strtolower($order->status) }}">
                            @switch($order->status)
                                @case('paid')
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Paid
                                    @break
                                @case('processing')
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Processing
                                    @break
                                @case('shipped')
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    Shipped
                                    @break
                                @case('delivered')
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Delivered
                                    @break
                                @default
                                    {{ ucfirst($order->status) }}
                            @endswitch
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Order Details -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Order Items -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Order Items ({{ $order->items->count() }})
                        </h2>
                        
                        <div class="space-y-6">
                            @foreach($order->items as $item)
                            <div class="flex flex-col sm:flex-row items-start sm:items-center border-b border-gray-100 pb-6 last:border-0 last:pb-0">
                                <!-- Product Image -->
                                <div class="w-20 h-20 bg-gradient-to-br from-gray-50 to-blue-50 rounded-lg flex items-center justify-center mr-4 mb-4 sm:mb-0">
                                    <div class="text-center">
                                        <span class="text-2xl">📦</span>
                                        <!-- In real app: <img src="{{ $item->product->image_url }}" class="max-h-full max-w-full object-contain"> -->
                                    </div>
                                </div>
                                
                                <!-- Product Details -->
                                <div class="flex-1">
                                    <div class="flex flex-col sm:flex-row sm:items-start justify-between">
                                        <div>
                                            <h3 class="font-bold text-gray-900">{{ $item->product->name }}</h3>
                                            <p class="text-gray-600 text-sm mt-1">SKU: {{ $item->product->sku ?? 'N/A' }}</p>
                                            <div class="flex items-center mt-2">
                                                <span class="text-sm text-gray-500">Qty: {{ $item->quantity }}</span>
                                                <span class="mx-2 text-gray-300">•</span>
                                                <span class="text-sm text-gray-500">Unit Price: ${{ number_format($item->price, 2) }}</span>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-2 sm:mt-0 text-right">
                                            <p class="text-xl font-bold text-gray-900">${{ number_format($item->subtotal, 2) }}</p>
                                            @if($item->quantity > 1)
                                            <p class="text-sm text-gray-500">${{ number_format($item->price, 2) }} each</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Order Timeline -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Order Status Timeline
                        </h2>
                        
                        <div class="timeline">
                            @php
                                $timeline = [
                                    'order_placed' => [
                                        'date' => $order->created_at,
                                        'title' => 'Order Placed',
                                        'description' => 'Your order has been received',
                                        'completed' => true,
                                        'active' => $order->status == 'paid',
                                    ],
                                    'processing' => [
                                        'date' => $order->status == 'processing' || $order->status == 'shipped' || $order->status == 'delivered' ? $order->created_at->addHours(2) : null,
                                        'title' => 'Processing',
                                        'description' => 'We\'re preparing your order',
                                        'completed' => in_array($order->status, ['processing', 'shipped', 'delivered']),
                                        'active' => $order->status == 'processing',
                                    ],
                                    'shipped' => [
                                        'date' => $order->status == 'shipped' || $order->status == 'delivered' ? $order->created_at->addDays(1) : null,
                                        'title' => 'Shipped',
                                        'description' => 'Your order is on the way',
                                        'completed' => in_array($order->status, ['shipped', 'delivered']),
                                        'active' => $order->status == 'shipped',
                                    ],
                                    'delivered' => [
                                        'date' => $order->status == 'delivered' ? $order->created_at->addDays(3) : null,
                                        'title' => 'Delivered',
                                        'description' => 'Your order has been delivered',
                                        'completed' => $order->status == 'delivered',
                                        'active' => $order->status == 'delivered',
                                    ],
                                ];
                            @endphp
                            
                            @foreach($timeline as $key => $step)
                            <div class="timeline-item {{ $step['completed'] ? 'completed' : '' }} {{ $step['active'] ? 'active' : '' }}">
                                <div class="ml-4">
                                    <div class="flex items-center justify-between">
                                        <h3 class="font-semibold text-gray-900">{{ $step['title'] }}</h3>
                                        @if($step['date'])
                                        <span class="text-sm text-gray-500">{{ $step['date']->format('M d, h:i A') }}</span>
                                        @endif
                                    </div>
                                    <p class="text-gray-600 mt-1">{{ $step['description'] }}</p>
                                    
                                    @if($key == 'shipped' && $order->tracking_number)
                                    <div class="mt-3 p-3 bg-blue-50 rounded-lg">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">Tracking Number</p>
                                                <p class="tracking-number text-lg">{{ $order->tracking_number }}</p>
                                            </div>
                                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                                Track Package →
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Shipping & Billing -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Shipping Address -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Shipping Address
                            </h2>
                            
                            <div class="space-y-2">
                                <p class="font-medium text-gray-900">{{ $order->first_name }} {{ $order->last_name }}</p>
                                <p class="text-gray-600">{{ $order->shipping_address }}</p>
                                <p class="text-gray-600">{{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zip }}</p>
                                <p class="text-gray-600">{{ $order->shipping_country }}</p>
                                <p class="text-gray-600 mt-4">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    {{ $order->phone }}
                                </p>
                                <p class="text-gray-600">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    {{ $order->email }}
                                </p>
                            </div>
                            
                            <div class="mt-6 pt-6 border-t border-gray-100">
                                <p class="text-sm text-gray-500 mb-2">Shipping Method</p>
                                <p class="font-medium text-gray-900">Standard Shipping</p>
                                <p class="text-gray-600 text-sm">3-5 business days • FREE</p>
                            </div>
                        </div>
                        
                        <!-- Billing Address -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Billing Address & Payment
                            </h2>
                            
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Billing Address</p>
                                    <p class="text-gray-600">{{ $order->billing_address }}</p>
                                    <p class="text-gray-600">{{ $order->billing_city }}, {{ $order->billing_state }} {{ $order->billing_zip }}</p>
                                </div>
                                
                                <div class="pt-4 border-t border-gray-100">
                                    <p class="text-sm text-gray-500 mb-1">Payment Method</p>
                                    <div class="flex items-center">
                                        <div class="w-10 h-6 bg-gradient-to-r from-blue-600 to-indigo-600 rounded mr-3 flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">CH</span>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Chase Payment</p>
                                            <p class="text-gray-600 text-sm">Payment ID: {{ substr($order->payment_id, 0, 12) }}...</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="pt-4 border-t border-gray-100">
                                    <p class="text-sm text-gray-500 mb-1">Payment Status</p>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Paid
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column: Order Summary & Actions -->
                <div class="space-y-8">
                    <!-- Order Summary -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>
                        
                        <div class="space-y-4">
                            <div class="invoice-line">
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-medium text-gray-900">${{ number_format($order->subtotal, 2) }}</span>
                                </div>
                                
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-600">Shipping</span>
                                    <span class="font-medium text-green-600">FREE</span>
                                </div>
                                
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tax</span>
                                    <span class="font-medium text-gray-900">${{ number_format($order->tax, 2) }}</span>
                                </div>
                            </div>
                            
                            <div class="pt-4 border-t border-gray-200">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Total</span>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-gray-900">${{ number_format($order->total, 2) }}</p>
                                        <p class="text-gray-500 text-sm">USD</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Order Actions -->
                        <div class="mt-8 pt-8 border-t border-gray-100 space-y-4">
                            <button onclick="window.print()" class="w-full border border-gray-300 text-gray-700 font-medium py-3 px-6 rounded-xl hover:bg-gray-50 transition-colors duration-200 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                                Print Invoice
                            </button>
                            
                            <a href="{{ route('visitor.products.index') }}" class="block w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-3 px-6 rounded-xl text-center hover:from-blue-700 hover:to-indigo-700 transition">
                                Continue Shopping
                            </a>
                            
                            @if($order->status == 'paid' || $order->status == 'processing')
                            <button onclick="cancelOrder({{ $order->id }})" class="w-full border border-red-300 text-red-600 font-medium py-3 px-6 rounded-xl hover:bg-red-50 transition-colors duration-200 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Cancel Order
                            </button>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Need Help? -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Need Help?</h3>
                        <p class="text-gray-600 mb-4">Our customer support team is here to help with your order.</p>
                        
                        <div class="space-y-3">
                            <a href="tel:+15551234567" class="flex items-center text-blue-600 hover:text-blue-800">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div>
                                    <div class="font-medium">Call Support</div>
                                    <div class="text-sm">+1 (555) 123-4567</div>
                                </div>
                            </a>
                            
                            <a href="mailto:support@example.com" class="flex items-center text-blue-600 hover:text-blue-800">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <div class="font-medium">Email Support</div>
                                    <div class="text-sm">support@example.com</div>
                                </div>
                            </a>
                            
                            <a href="/contact" class="flex items-center text-blue-600 hover:text-blue-800">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                                <div>
                                    <div class="font-medium">Live Chat</div>
                                    <div class="text-sm">Available 24/7</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Order QR Code (Optional) -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Order QR Code</h3>
                        <div class="flex justify-center">
                            <div class="p-4 border border-gray-200 rounded-lg inline-block">
                                <!-- QR Code would go here -->
                                <div class="w-32 h-32 bg-gradient-to-br from-gray-100 to-blue-100 rounded flex items-center justify-center">
                                    <div class="text-center">
                                        <div class="text-3xl mb-2">📱</div>
                                        <div class="text-xs text-gray-500">Scan for details</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-4">Scan this QR code to access your order details on mobile.</p>
                    </div>
                </div>
            </div>
            
            <!-- Order Notes -->
            @if($order->notes)
            <div class="mt-8 bg-yellow-50 border border-yellow-200 rounded-2xl p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.998-.833-2.732 0L4.103 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                    Order Notes
                </h3>
                <p class="text-gray-700">{{ $order->notes }}</p>
            </div>
            @endif
            
            <!-- Recent Orders (Optional) -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Recent Orders</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @for($i = 1; $i <= 3; $i++)
                    <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <p class="text-sm text-gray-500">Order #{{ 1000 + $i }}</p>
                                <p class="font-bold text-gray-900">${{ number_format(rand(100, 1000), 2) }}</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Delivered</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">{{ rand(1, 5) }} items • {{ now()->subDays($i)->format('M d') }}</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                            View Details
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    
    <script>
    function cancelOrder(orderId) {
        if (confirm('Are you sure you want to cancel this order? This action cannot be undone.')) {
            // In real app, make AJAX call to cancel order
            fetch(`/orders/${orderId}/cancel`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Order cancelled successfully.');
                    window.location.reload();
                } else {
                    alert('Failed to cancel order: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while cancelling the order.');
            });
        }
    }
    
    // Print styles
    @media print {
        .no-print {
            display: none !important;
        }
        
        body {
            background: white !important;
        }
        
        .bg-gray-50 {
            background: white !important;
        }
        
        .shadow-lg {
            box-shadow: none !important;
        }
        
        .rounded-2xl {
            border-radius: 0 !important;
        }
        
        .border {
            border: 1px solid #000 !important;
        }
    }
    </script>
</x-visitor-layout>