<?php

namespace App\Utility;

use Cake\I18n\DateTime;

class DateTimeUtility
{
    /**
     * @param DateTime $dateTime
     * @param $type
     * @return string
     */
    public static function getDateTimeAsString(DateTime $dateTime,$type='default'): string
    {
        $format = self::strftime_format_to_date_format(__('time_formats_' . $type));
        return $dateTime->format($format,'Y-m-d H:i:s');
    }

    /**
     * @param int $begin
     * @param int $end
     * @return string
     */
    public static function diffTimeStampAsString(int $begin, int $end): string
    {
        $diffTime = $begin - $end;
        if( $diffTime < 60 )
        {
            $ret = __('datetime_distance_in_words_less_than_x_minutes_one');
        }
        else if( $diffTime == 60 )
        {
            $ret = __('datetime_distance_in_words_x_minutes_one');
        }
        else if( $diffTime < 60 * 45 )
        {
            $format = self::strftime_format_to_date_format(__('datetime_distance_in_words_x_minutes_other'));
            $ret = StringUtility::getFormatAsString($format, [
                'count' => floor ($diffTime / 60),
            ]);
        }
        else if( $diffTime < 60 * 90 )
        {
            $ret = __('datetime_distance_in_words_about_x_hours_one');
        }
        else if( $diffTime < 60 * 1440 )
        {
            $format = self::strftime_format_to_date_format(__('datetime_distance_in_words_about_x_hours_other'));
            $ret = StringUtility::getFormatAsString($format, [
                'count' => floor ($diffTime / 3600),
            ]);
        }
        else if( $diffTime <= 60 * 2880 )
        {
            $ret = __('datetime_distance_in_words_x_days_one');
        }
        else if( $diffTime <= 86400 * 365 )
        {
            $format = self::strftime_format_to_date_format(__('datetime_distance_in_words_x_days_other'));
            $ret = StringUtility::getFormatAsString($format, [
                'count' => floor ($diffTime / 86400),
            ]);
        }
        else
        {
            $years = floor ($diffTime / (86400 * 365)); //  ?? days
            $limit = $diffTime - $years * 365 * 86400;
            if( $limit < (86400 * 30) )
            {
                $format = self::strftime_format_to_date_format(__('datetime_distance_in_words_almost_x_years_other'));
            }
            else if( $limit < (86400 * 90) )
            {
                $format = self::strftime_format_to_date_format(__('datetime_distance_in_words_about_x_years_other'));
            }
            else if( $limit < (86400 * 300) )
            {
                $format = self::strftime_format_to_date_format(__('datetime_distance_in_words_over_x_years_other'));
            }
            else
            {
                $years++;
                $format = self::strftime_format_to_date_format(__('datetime_distance_in_words_about_x_years_other'));
            }
            // about %{count} years
            $ret = StringUtility::getFormatAsString($format, [
                'count' => $years,
            ]);
        }
        return $ret;
    }

    /**
     * Convert strftime format to php date format
     * @param $strftimeformat
     * @return string|string[]
     * @throws Exception
     */
    private static function strftime_format_to_date_format(string $strftimeformat):string
    {
        $unsupported = ['%U', '%V', '%C', '%g', '%G'];
        $foundunsupported = [];
        foreach ($unsupported as $unsup) {
            if (strpos($strftimeformat, $unsup) !== false) {
                $foundunsupported[] = $unsup;
            }
        }
        if (!empty($foundunsupported)) {
            throw new \Exception("Found these unsupported chars: " . implode(",", $foundunsupported) . ' in ' . $strftimeformat);
        }
        // It is important to note that some do not translate accurately ie. lowercase L is supposed to convert to number with a preceding space if it is under 10, there is no accurate conversion so we just use 'g'
        $phpdateformat = str_replace(
            ['%a', '%A', '%d', '%e', '%u', '%w', '%W', '%b', '%h', '%B', '%m', '%y', '%Y', '%D', '%F', '%x', '%n', '%t', '%H', '%k', '%I', '%l', '%M', '%p', '%P', '%r' /* %I:%M:%S %p */, '%R' /* %H:%M */, '%S', '%T' /* %H:%M:%S */, '%X', '%z', '%Z',
                '%c', '%s',
                '%%'],
            ['D', 'l', 'd', 'j', 'N', 'w', 'W', 'M', 'M', 'F', 'm', 'y', 'Y', 'm/d/y', 'Y-m-d', 'm/d/y', "\n", "\t", 'H', 'G', 'h', 'g', 'i', 'A', 'a', 'h:i:s A', 'H:i', 's', 'H:i:s', 'H:i:s', 'O', 'T',
                'D M j H:i:s Y' /*Tue Feb 5 00:45:10 2009*/, 'U',
                '%'],
            $strftimeformat
        );
        return $phpdateformat;
    }
}
