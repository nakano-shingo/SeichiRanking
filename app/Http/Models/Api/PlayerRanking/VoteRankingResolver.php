<?php

namespace App\Http\Models\Api\PlayerRanking;

class VoteRankingResolver extends RankingResolver
{
    const TOTAL_TABLE_TARGET = 'playerdata';
    const TOTAL_COMPARE_TARGET = 'p_vote';

    const DAILY_TABLE_TARGET = 'daily_ranking_table';
    const WEEKLY_TABLE_TARGET = 'weekly_ranking_table';
    const MONTHLY_TABLE_TARGET = 'monthly_ranking_table';
    const YEARLY_TABLE_TARGET = 'yearly_ranking_table';

    const COMPARE_TARGET = 'vote_count';

    const RANKING_TYPE = 'vote';

    /**
     * ランキングデータを取得するために利用するテーブル名を返却する
     * @return string
     */
    function getRankTable()
    {
        switch (request('duration'))
        {
            case 'daily':
                return self::DAILY_TABLE_TARGET;
            case 'weekly':
                return self::WEEKLY_TABLE_TARGET;
            case 'monthly':
                return self::MONTHLY_TABLE_TARGET;
            case 'yearly':
                return self::YEARLY_TABLE_TARGET;
            default:
                return self::TOTAL_TABLE_TARGET;
        }
    }

    /**
     * ランキングデータを取得するために利用するカラム名を返却する
     * @return string
     */
    function getRankComparator()
    {
        if (request('duration') === 'total' || blank(request('duration'))) {
            // 総合
            return self::TOTAL_COMPARE_TARGET;
        } else {
            // 総合以外
            return self::COMPARE_TARGET;
        }

    }

    function getRankingType()
    {
        return self::RANKING_TYPE;
    }
}