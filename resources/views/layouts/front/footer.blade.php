@php
        $copyright = DB::table('m_flag')->where('id', 3)->first();
@endphp
    <footer class="site-footer">

        <p>
            {{$copyright->flag_value}}
            <span>domain name</span>
        </p>

    </footer>