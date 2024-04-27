<!DOCTYPE html>
<html>
<head>
    <title>Laravel Livewire Example - ItSolutionStuff.com</title>
    @livewireStyles
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.0/tailwind.min.css" integrity="sha512-wOgO+8E/LgrYRSPtvpNg8fY7vjzlqdsVZ34wYdGtpj/OyVdiw5ustbFnMuCb75X9YdHHsV5vY3eQq3wCE4s5+g==" crossorigin="anonymous" /> --}}
</head>
<body>
    
<div class="container">
    
    <div class="card">
      <div class="card-header">
        Laravel Livewire Example - ItSolutionStuff.com
      </div>
      <div class="card-body">
        @livewire('actualites-pagination')
      </div>
    </div>
        
</div>
  

@livewireScripts
</body>
  

  
</html>