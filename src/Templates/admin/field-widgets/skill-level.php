<?php
/**
 * Context:
 *
 * @var string $widget_id
 * @var string $meta_key
 * @var string $add_button_text
 * @var string $remove_button_text
 * @var bool   $output_template
 */

if (!isset($add_button_text) || !$add_button_text) {
    $add_button_text = '+';
}

if (!isset($remove_button_text) || !$remove_button_text) {
    $remove_button_text = '-';
}
?>

<table id="<?php echo esc_attr($widget_id); ?>">
  <thead>
  <tr>
    <th style="width: 5px;"></th>
    <th>슬러그</th>
    <th>레이블</th>
    <th></th>
  </tr>
  </thead>
  <tbody id="<?php echo esc_attr($widget_id); ?>-tbody">
  </tbody>
</table>

<button style="margin-top: 10px; margin-bottom: 5px;"
        class="button button-primary add-new-skill-level"
        type="button"
        rel="<?php echo esc_attr($widget_id); ?>-tbody"
        title="항목 추가">
    <?php echo esc_html($add_button_text); ?>
</button>

<?php if ($output_template) : ?>
  <script type="text/template" id="tmpl-skill-level">
    <tr class="skill-level-item">
      <td><span class="dashicons dashicons-sort"></span></td>
      <td>
        <input type="text"
               class="text skill-level-input"
               name="<?php echo esc_attr($meta_key); ?>[{{ data.index }}][slug]"
               value="{{ data.slug }}">
      </td>
      <td>
        <input type="text"
               class="text skill-level-input"
               name="<?php echo esc_attr($meta_key); ?>[{{ data.index }}][label]"
               value="{{ data.label}}">
      </td>
      <td>
        <button type="button" class="button button-secondary remove-skill-level" title="항목 제거">
            <?php echo esc_html($remove_button_text); ?>
        </button>
      </td>
    </tr>
  </script>
  <style>
    tr.skill-level-item > td {
      padding: 5px;
    }

    tr.skill-level-item > td:first-of-type {
      cursor: move;
    }
  </style>
<?php endif; ?>
