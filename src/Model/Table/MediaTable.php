<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Media Model
 *
 * @property \App\Model\Table\PostsTable&\Cake\ORM\Association\BelongsTo $Posts
 *
 * @method \App\Model\Entity\Media newEmptyEntity()
 * @method \App\Model\Entity\Media newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Media> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Media get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Media findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Media patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Media> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Media|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Media saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Media>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Media>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Media>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Media> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Media>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Media>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Media>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Media> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MediaTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('media');
        $this->setDisplayField('file_url');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('post_id')
            ->notEmptyString('post_id');

        $validator
            ->scalar('file_url')
            ->maxLength('file_url', 255)
            ->requirePresence('file_url', 'create')
            ->notEmptyString('file_url');

        $validator
            ->scalar('file_type')
            ->maxLength('file_type', 20)
            ->requirePresence('file_type', 'create')
            ->notEmptyString('file_type');

        $validator
            ->integer('position')
            ->notEmptyString('position');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['post_id'], 'Posts'), ['errorField' => 'post_id']);

        return $rules;
    }
}
