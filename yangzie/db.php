<?php
abstract class YZE_DB {
    /**
     *
     * 查询某个字段的值
     * 
     * @param string $field
     *            字段名
     * @param string $table
     *            表名
     * @param string $where
     *            条件，<font>注意sql转移</font>
     */
    public abstract function lookup($field, $table, $where);
    
    /**
     *
     * 查询某些字段的值,返回单条记录
     * 
     * @param string $fields            
     * @param string $table            
     * @param string $where            
     */
    public abstract function lookup_record($fields, $table, $where);
    
    /**
     *
     * 查询某些字段的值,返回多条记录
     * 
     * @param string $fields            
     * @param string $table            
     * @param string $where            
     */
    public abstract function lookup_records($fields, $table, $where);
    
    /**
     *
     * 更新某些字段的值
     * 
     * @param string $table            
     * @param string $fields
     *            格式如"a=:a,b=:b,c=:c"
     * @param string $where
     *            注意sql注入 格式如"a=:a and b=:b"
     * @param array $values
     *            格式如array(:a=>1,:b=>2)
     */
    public abstract function update($table, $fields, $where, $values);
    
    /**
     *
     * 删除单表数据
     * 
     * @param string $table            
     * @param string $where
     *            注意sql注入 格式如"a=:a and b=:b"
     */
    public abstract function delete($table, $where);
    
    /**
     * 插入单表数据,返回自增的主键
     *
     * @param string $table
     *            表名称
     * @param array $info
     *            键为$table字段
     */
    public abstract function insert($table, $info);
    
    /**
     *
     * 获取指定表的所有字段
     * 
     * @param
     *            $table
     * @return array
     */
    public abstract function table_fields($table);
} 