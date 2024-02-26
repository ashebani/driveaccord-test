@props(['user', 'class' => ''])

<img
    alt="Speaker"
    src="{{$user->image_url}}"
    class="rounded-lg object-cover w-16 h-16 {{$class}} aspect-square {{($user->user_points < 5) ? '' : (($user->user_points <= 10) ? 'bronze_border' : (($user->user_points <= 20) ? 'silver_border' : 'gold_border'))}}
"
/>
