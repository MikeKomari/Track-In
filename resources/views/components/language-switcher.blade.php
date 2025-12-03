@php
  $languages = [
            ['code' => 'en', 'label' => 'EN'],
            ['code' => 'id', 'label' => 'ID'],
        ];
  $currentLang = app()->getLocale();
@endphp
<div class="my-2 flex items-center justify-between gap-1 p-1 bg-secondary/10 rounded-md">
    @foreach ($languages as $lang)
        @php
            $isActiveLang = $currentLang === $lang['code'];
        @endphp

        <a href="{{ route('lang.switch', $lang['code']) }}"
            @class([
                'flex-1 text-center rounded-md text-xs p-1 transition-all',
                'bg-white text-accent font-bold shadow-soft' => $isActiveLang,
                'text-secondary hover:bg-secondary/20 animate-cta' => !$isActiveLang,
                'group-data-[navbar-state=closed]:hidden' => true,
            ])>
            {{ strtoupper($lang['label']) }}
        </a>

        @if ($isActiveLang)
            
            <a href="{{ route('lang.switch', $lang['code']) }}"
                @class([
                    'hidden group-data-[navbar-state=closed]:flex text-center rounded-md text-xs p-1 transition-all bg-white text-accent shadow-soft w-full justify-center',
                ])>
                {{ strtoupper($lang['label']) }}
            </a>
        @endif
    @endforeach
</div>