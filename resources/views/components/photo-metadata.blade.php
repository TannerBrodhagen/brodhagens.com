@php
    $exif = is_array($exif) ? $exif : [];
@endphp
<div class="photo-exif">
    
    @if (array_key_exists('ApertureValue', $exif))
        <span>
            <span class="material-symbols-outlined">
                camera
            </span>
            Aperture: {{ $exif['ApertureValue'] }}
        </span>
    @endif
    @if (array_key_exists('ISOSpeedRatings', $exif))
        <span>
            <span class="material-symbols-outlined">
                shutter_speed
            </span>
            ISO: {{ $exif['ISOSpeedRatings'] }}
        </span>
    @endif
    
    @if (array_key_exists('FocalLength', $exif))
        <span>
            <span class="material-symbols-outlined">
                trail_length_medium
            </span>
            Focal Length: {{ $exif['FocalLength'] }}
        </span>
    @endif
    @if (array_key_exists('ExposureTime', $exif))
        <span>
            <span class="material-symbols-outlined">
                exposure
            </span>
            Exposure: {{ $exif['ExposureTime'] }}
        </span>
    @endif
    @if (array_key_exists('WhiteBalance', $exif))
        <span>
            <span class="material-symbols-outlined">
                contrast
            </span>
            White Balance: {{ $exif['WhiteBalance'] }}
        </span>
    @endif
    @if (array_key_exists('Flash', $exif) && $exif['Flash'])
        <span>
            <span class="material-symbols-outlined">
                flash_on
            </span>
            Flash: {{ $exif['Flash'] }}
        </span>
    @endif
</div>
