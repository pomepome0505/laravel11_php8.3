erDiagram
    inquiries ||--o{ inquiry_responses : "has"
    users ||--o{ inquiries : "assigned to"
    users ||--o{ inquiry_responses : "created by"
    
    inquiries {
        bigint id PK "主キー"
        varchar inquiry_number UK "受付番号 (例: INQ-20260213-0001)"
        varchar category "カテゴリ (product/order/shipping/return/system/other)"
        varchar order_number "注文番号 (任意)"
        varchar subject "件名"
        text body "本文"
        varchar customer_name "顧客氏名"
        varchar customer_email "顧客メールアドレス"
        varchar status "ステータス (pending/in_progress/resolved/closed)"
        varchar priority "優先度 (low/medium/high/urgent)"
        bigint assigned_to FK "担当者ID (NULL可)"
        text internal_notes "対応メモ (社内向け、NULL可)"
        timestamp created_at "作成日時"
        timestamp updated_at "更新日時"
    }
    
    users {
        bigint id PK "主キー"
        varchar name "担当者氏名"
        varchar email UK "メールアドレス"
        varchar password "パスワード (ハッシュ化)"
        timestamp created_at "作成日時"
        timestamp updated_at "更新日時"
    }
    
    inquiry_responses {
        bigint id PK "主キー"
        bigint inquiry_id FK "問い合わせID"
        text content "返信メール本文"
        bigint created_by FK "送信者ID"
        timestamp created_at "送信日時"
        timestamp updated_at "更新日時"
    }
