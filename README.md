[![StyleCI](https://styleci.io/repos/73927392/shield)](https://styleci.io/repos/73927392)
[![Total Downloads](https://poser.pugx.org/agilesdesign/flasher/downloads)](https://packagist.org/packages/agilesdesign/flasher)
# flasher
Flash messaging library for Laravel

*Credit to Jeffrey Way over at Laracasts. This package is highly inspired from his [flash](https://github.com/laracasts/flash) library.*

### Installation

##### Include through composer

`composer require agilesdesign/flasher`

##### Add to provider list

```php
'providers' => [
    agilesdesign\Laravel\Flasher\Providers\FlasherServiceProvider::class,
];
```

### Usage
##### Flash  message to Session
```php
flasher()->alert('Please login', Notifier::INFO);
```

##### Render

###### Bootstrap Alerts
```php
@foreach($alerts->messages() as $level => $alert)
    @foreach($alert as $message)
    <div class="alert alert-{{ $level }}">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    	{{ $message }}
    </div>
    @endforeach
@endforeach
```

###### notie
```php
@foreach($alerts->messages() as $level => $alert)
    @foreach($alert as $message)
         notie.alert(
            "@if($level == 'danger'){{ 'error' }}@else{{ $level }}@endif",
            "{{ $message }}",
            2
        );
    @endforeach
@endforeach
```
