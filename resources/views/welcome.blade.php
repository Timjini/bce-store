<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BCE Industrial | Precision Tools & Components</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-bce-blue text-white font-sans antialiased dark:bg-black dark:text-gray-100">

    <!-- Header -->
    <x-common.header />

    <!-- Hero Section -->
    <x-common.hero />

    <!-- Featured Products -->
    <x-partials.home-page-products />

    <section class="powertrain-section">
        <div class="container mx-auto">
            <div class="section-header">
                <div class="section-tag">Patented Material, Design and Manufacturing Process</div>
                <h1 class="section-title">Making Powertrains better across <span>every vector</span></h1>
                <p class="section-subtitle">Revolutionary technology that transforms efficiency, manufacturing, and performance across the entire powertrain ecosystem.</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="feature-title">Compact Design</h3>
                    <p class="feature-description">High power density with 50% length and weight reduction. Highest efficiency standards that increase range and lower operating costs.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="feature-title">100X Simpler Manufacturing</h3>
                    <p class="feature-description">From 1kW to 25kW on the same production line. Modular and stackable design with 80%+ part commonization.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <h3 class="feature-title">Integrated Hardware & Software</h3>
                    <p class="feature-description">Unified design for Motor, Gearbox, Power Electronics and Software. APIs enable performance tuning and new feature creation.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                        </svg>
                    </div>
                    <h3 class="feature-title">Rare-Earth Agnostic</h3>
                    <p class="feature-description">Uses widely available, cost-effective Ferrite Magnets with up to 2× power density. Iron usage reduced by 80%.</p>
                </div>
            </div>
            
            <div class="cta-section">
                <a href="#products" class="cta-button">
                    View Our Products
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14M19 12l-7 7-7-7"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- About BCE -->
    <!-- Industries Overview Section -->
    <section class="bg-white dark:bg-bce-steel text-bce-blue dark:text-white py-20 px-6">
    <div class="max-w-7xl mx-auto">
        <!-- Heading + Intro -->
        <div class="grid md:grid-cols-2 gap-10 mb-16">
            <div>
                <p class="text-bce-accent font-semibold uppercase tracking-wide text-sm mb-3">
                    High Performance Services For Multiple Industries
                </p>
                <h2 class="text-4xl font-extrabold leading-tight mb-6">
                    Utilising Latest Processing Solutions, And Decades Of Work Experience.
                </h2>
            </div>
            <div>
                <p class="text-bce-steel dark:text-gray-200 mb-6">
                    BCE Industrial has built its reputation on engineering excellence — combining innovation,
                    precision, and a commitment to quality. We serve a diverse global market with expertise
                    honed through years of experience across multiple industrial sectors.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="#"
                       class="bg-bce-steel hover:bg-black text-white font-bold py-3 px-6 rounded-md text-center transition duration-300">
                        How Does It Work?
                    </a>
                    <a href="#"
                       class="bg-transparent hover:bg-bce-accent hover:text-white text-bce-accent font-bold py-3 px-6 border-2 border-bce-accent rounded-md text-center transition duration-300">
                        Check All Services →
                    </a>
                </div>
            </div>
        </div>

        <!-- Service Cards -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 text-center md:text-left">
                <!-- Oil & Gas -->
                <div class="bg-gray-50 dark:bg-bce-blue p-8 rounded-lg shadow hover:shadow-lg transition">
                    <div class="text-bce-accent text-4xl mb-4">⛽</div>
                    <h3 class="font-bold text-lg mb-2">Oil &amp; Gas Energy</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        Petroleum and natural gas are nonrenewable sources used in energy production and manufacturing.
                    </p>
                    <a href="#" class="inline-flex items-center text-bce-accent font-semibold text-sm hover:underline">
                        Explore More →
                    </a>
                </div>

                <!-- Industrial Construction (Highlighted) -->
                <div class="bg-bce-accent text-white p-8 rounded-lg shadow-lg hover:shadow-xl transition relative overflow-hidden">
                    <div class="text-4xl mb-4">🏗️</div>
                    <h3 class="font-bold text-lg mb-2">Industrial Construction</h3>
                    <p class="text-sm mb-4">
                        Expertise in planning, construction, and infrastructure management — roads, tunnels, and bridges.
                    </p>
                    <a href="#" class="inline-flex items-center font-semibold text-sm hover:underline">
                        Explore More →
                    </a>
                </div>

                <!-- Mechanical Engineering -->
                <div class="bg-gray-50 dark:bg-bce-blue p-8 rounded-lg shadow hover:shadow-lg transition">
                    <div class="text-bce-accent text-4xl mb-4">⚙️</div>
                    <h3 class="font-bold text-lg mb-2">Mechanical Engineering</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        Applying material and design science to develop, analyze, and maintain mechanical systems.
                    </p>
                    <a href="#" class="inline-flex items-center text-bce-accent font-semibold text-sm hover:underline">
                        Explore More →
                    </a>
                </div>

                <!-- Automotive Manufacturing -->
                <div class="bg-gray-50 dark:bg-bce-blue p-8 rounded-lg shadow hover:shadow-lg transition">
                    <div class="text-bce-accent text-4xl mb-4">🤖</div>
                    <h3 class="font-bold text-lg mb-2">Automotive Manufacturing</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                        Providing advanced solutions for the design, automation, and assembly of vehicle components.
                    </p>
                    <a href="#" class="inline-flex items-center text-bce-accent font-semibold text-sm hover:underline">
                        Explore More →
                    </a>
                </div>
            </div>

            <!-- Bottom Note -->
            <div class="bg-gray-100 dark:bg-bce-blue mt-10 p-6 rounded-lg flex flex-col sm:flex-row items-center justify-between text-sm text-bce-steel dark:text-gray-200">
                <p class="mb-4 sm:mb-0">
                    We maintain strong values that reflect our commitment to quality and innovation.
                    <a href="#" class="text-bce-accent font-semibold hover:underline">Schedule a Visit</a>
                </p>
                <a href="#"
                class="border-2 border-bce-accent text-bce-accent hover:bg-bce-accent hover:text-white font-bold py-3 px-6 rounded-md transition duration-300">
                    Get a Free Quote
                </a>
            </div>
        </div>
    </section>



    <!-- Call to Action -->
    <x-partials.call-to-action />

    <!-- Building Future Section -->
<section class="bg-bce-blue dark:bg-black text-white py-20 px-6">
  <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 items-center">
    <!-- Left Content -->
    <div>
      <h2 class="text-4xl font-extrabold mb-4">
        Building Future, Restoring Past!
      </h2>
      <p class="text-gray-300 mb-10">
        As one of the world’s leading industrial suppliers, BCE builds
        relationships and projects that last — serving an impressive list of
        clients with proven experience across multiple industries.
      </p>

      <!-- Feature List -->
      <div class="space-y-8 mb-10 border-t border-b border-white/10 py-8">
        <!-- Feature 1 -->
        <div class="flex items-start space-x-4">
          <div class="text-bce-accent text-3xl">⚙️</div>
          <div>
            <h3 class="font-semibold text-lg mb-1">Quality Control System</h3>
            <p class="text-gray-300 text-sm">
              We enhance our industrial operations by relieving you of the
              worries associated with logistics and freight handling.
            </p>
          </div>
        </div>

        <!-- Feature 2 -->
        <div class="flex items-start space-x-4">
          <div class="text-bce-accent text-3xl">🧪</div>
          <div>
            <h3 class="font-semibold text-lg mb-1">Accurate Testing Processes</h3>
            <p class="text-gray-300 text-sm">
              We’ll work with you to fine-tune your construction or manufacturing
              projects for maximum precision and compliance.
            </p>
          </div>
        </div>

        <!-- Feature 3 -->
        <div class="flex items-start space-x-4">
          <div class="text-bce-accent text-3xl">👷‍♂️</div>
          <div>
            <h3 class="font-semibold text-lg mb-1">Highly Professional Staff</h3>
            <p class="text-gray-300 text-sm">
              Skilled experts ensure smooth operations, helping reduce labor
              costs while maintaining top-tier standards.
            </p>
          </div>
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex flex-wrap gap-4">
        <a href="#"
           class="bg-white text-bce-blue font-bold py-3 px-6 rounded-md text-center hover:bg-gray-200 transition duration-300">
          Awards & Milestones
        </a>
        <a href="#"
           class="bg-transparent border-2 border-white text-white font-bold py-3 px-6 rounded-md text-center hover:bg-white hover:text-bce-blue transition duration-300">
          Learn More
        </a>
      </div>
    </div>

    <!-- Right Image Grid -->
    <div class="grid grid-cols-2 gap-4">
      <!-- Image 1 -->
      <div class="relative rounded-lg overflow-hidden group">
        <img
          src="https://images.unsplash.com/photo-1581093588401-22d51f0b0b3b?auto=format&fit=crop&w=600&q=80"
          alt="Retail & Consumer"
          class="object-cover h-64 w-full group-hover:scale-105 transition duration-500"
        />
        <div class="absolute inset-0 bg-black/40 flex flex-col justify-end p-4">
          <h4 class="font-semibold text-lg mb-1">Retail & Consumer</h4>
          <p class="text-sm text-gray-300">
            We understand the complexity of logistics, scale, and equipment
            handling across consumer industries.
          </p>
        </div>
      </div>

      <!-- Image 2 -->
      <div class="relative rounded-lg overflow-hidden group">
        <img
          src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=600&q=80"
          alt="Industrial & Chemical"
          class="object-cover h-64 w-full group-hover:scale-105 transition duration-500"
        />
        <div class="absolute inset-0 bg-black/40 flex flex-col justify-end p-4">
          <h4 class="font-semibold text-lg mb-1">Industrial & Chemical</h4>
          <p class="text-sm text-gray-300">
            Supporting production environments with precision tools, materials,
            and safe chemical handling systems.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- Footer -->
    <x-common.footer />

</body>
</html>
