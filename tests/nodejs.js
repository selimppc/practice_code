//Dependency Injection work in NestJS?

@Injectable()
export class UserService {
    constructor(private readonly userRepository: UserRepository) {}
}

//queue in nestjs
import { QueueModule } from '@nestjs/bull';
@Module({
  imports: [
    QueueModule.registerQueue({
      name: 'emails',
    }),
  ],
})
export class AppModule {}   

// rate limiting in NestJS
@useGuard(RateLimitGuard)
@RateLimit(5,60) // 5 requests per minute
@Get('users')
getUsers() {};

// nodejs Kafka producer: 
await KafkaProducer.send({
    'topic': 'test-topic',
    'messages': [{
        key: 'user_signup',
        value: JSON.stringify({
            userId: 123,
            email: '',
        })
    }]
})

//Q: How do you protect routes using Guards in NestJs
@Injectable()
export class AuthGuard implements CanActivate {
    canActive(contenxt: ExecutionContext): boolean {
        const request = contenxt.switchToHttp().getRequest();
        return request.user !== null;
    }
}

//usage
@UseGuards(AuthGuard)
@Get('profile')
getProfile(){}

// Q: What is DTO in nextJs: 
// A:
export class CreateUserDto {
    @IsString() name: string;
    @IsEmail() email: string;
}

//
