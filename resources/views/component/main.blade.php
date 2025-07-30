<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real Esate Property listing</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;800&display=swap" rel="stylesheet">


<style>
/* icon  */
.material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      }
/* end icon */

    /* Custom color palette */
    .bg-blue { background-color: #459FC2; }
    .bg-light-blue { background-color: #459FC2; }
    .text-navy-800 { color: #172a45; }
    .text-navy-700 { color: #2a4365; }
    .border-navy-800 { border-color: #172a45; }

    .bg-gold-300 { background-color: #d4af37; }
    .text-gold-300 { color: #d4af37; }
    .text-gold-700 { color: #a67c00; }
    .border-gold-300 { border-color: #d4af37; }

    .bg-cream-50 { background-color: #f8f4e9; }
    .text-cream-100 { color: #f0e6d2; }
    .border-cream-200 { border-color: #e8e0c9; }


        @keyframes scrollMarquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }


        .animate-marquee {
            display: inline-flex;
            animation: scrollMarquee 40s linear infinite;
        }

</style>

</head>
<body>
    @include('component.header')

    @yield('content')

    @include('component.footer')

  <!-- JavaScript for Tabs -->
  <script>
    const tabButtons = document.querySelectorAll('.tab-btn');
    const cards = document.querySelectorAll('.property-card');

    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const tab = btn.dataset.tab;

            // Update button styles
            tabButtons.forEach(b => {
                b.classList.remove('bg-blue', 'text-white');
                b.classList.add('bg-gray-100', 'text-gray-700');
            });
            btn.classList.add('bg-blue', 'text-white');
            btn.classList.remove('bg-gray-100', 'text-gray-700');

            // Filter cards
            cards.forEach(card => {
                if (tab === 'featured' && card.dataset.category === 'featured') {
                    card.classList.remove('hidden');
                } else if (tab === 'sell' && card.dataset.category === 'sell') {
                    card.classList.remove('hidden');
                } else if (tab === 'rent' && card.dataset.category === 'rent') {
                    card.classList.remove('hidden');
                } else if (tab === 'featured') {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        });
    });
</script>

</body>
</html>
