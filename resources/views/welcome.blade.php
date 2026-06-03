<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roupas Normais – Estilo sem complicação</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Instrument Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f7f7f8',
                            100: '#e8e8eb',
                            900: '#1a1a1a',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans bg-white text-brand-900 antialiased flex flex-col min-h-screen">

    <header class="border-b border-gray-100 sticky top-0 bg-white/90 backdrop-blur-md z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0 flex items-center">
                    <a href="#" class="text-2xl font-bold tracking-tight">Roupas Normais.</a>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-black font-medium transition-colors">LOGIN</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-black font-medium transition-colors">CADASTRE-SE</a>
                </div>
            </div>
        </div>
    </header>

    <section class="relative bg-brand-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32 flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 lg:pr-12 text-center lg:text-left mb-12 lg:mb-0">
                <h1 class="text-5xl lg:text-7xl font-bold tracking-tight text-brand-900 mb-6 leading-tight">
                    O básico <br/><span class="text-gray-500">bem feito.</span>
                </h1>
                <p class="text-lg text-gray-600 mb-8 max-w-lg mx-auto lg:mx-0">
                    Estilo sem complicação. Peças essenciais de alta qualidade, feitas para durar e acompanhar o seu ritmo todos os dias.
                </p>
            </div>
            <div class="lg:w-1/2 w-full">
                <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Pessoa vestindo camiseta básica" class="w-full h-[500px] object-cover rounded-2xl shadow-lg">
            </div>
        </div>
    </section>
</body>
</html>