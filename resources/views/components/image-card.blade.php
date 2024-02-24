@props(['user', 'class' => 'w-16 h-16'])

{{--<div class="rounded-lg aspect-square {{($user->user_points < 5) ? 'bronze_border' : ($user->user_points <= 10 ? 'silver_border' : 'golden_border')}}">--}}

<img
    alt="Speaker"
    src="{{$user->image_url}}"
    class="rounded-lg object-cover {{$class}} aspect-square {{($user->user_points < 5) ? '' : (($user->user_points <= 10) ? 'bronze_border' : (($user->user_points <= 20) ? 'silver_border' : 'gold_border'))}}"
/>
{{--</div>--}}
